<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <h5>
                        Welcome to the feeds finder.
                    </h5>

                    <form @submit.prevent="search">
                        <input type="text" v-model="topic">
                        <button type="submit" v-on:click="search">
                            Search Topic
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                  <p class="mb-0">
                      Related topics
                  </p>
                  <div class="mt-2">
                      <a class="badge badge-pill badge-danger mr-2" v-for="topic in Topics" v-on:click="setTopic(topic.topic)">
                          {{topic.topic}}
                      </a>&nbsp;
                  </div>&nbsp;
              </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
            <div class="col-lg-12">
                <div class="spinner-border " v-if="loading" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <table v-else class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Subscribers</th>
                        <th scope="col">Score</th>
                        <th scope="col">Link</th>
                        <th scope="col">Exists</th>
                        <th scope="col">Update</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(feed, index) in Feeds">
                        <th scope="row">{{index}}</th>
                        <td>
                            <a :href="feed.website">{{ feed.title }}</a>
                            <br>
                            <span v-for="topic in feed.topics">{{ topic }},</span>
                        </td>
                        <td>
                            {{ feed.url }}
                        </td>
                        <td>{{ feed.subscribers }}</td>
                        <td>{{ feed.score }}</td>

                        <td>
                                <span class="badge bg-success" v-if="feed.imported">
                                    Subscribed
                                </span>
                            <span v-else class="badge badge-pill badge-danger">
                                    Not Subscribed
                                </span>
                        </td>
                        <td>{{ feed.updated }}</td>

                        <td>
                            <a v-if="!feed.imported" href="#" @click.prevent="subscribe(feed)">
                                Subscribe
                            </a>
                            <a class="badge bg-danger" v-else href="#" @click.prevent="unsubscribe(feed)">
                                Unsubscribe
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
</template>
<script>
console.log('findFeeds.vue');
export default {
    name: 'Feeds',
    data() {
        return {
            message: this.message,
            errored: false,
            topic: "laravel",
            loading: true,
            Feeds: [],
            Topics: [],
        }
    },
    methods: {
        search() {
            this.loading = true;
            fetch('/feeds/search/' + this.topic)
                .then(res => {
                    return res.json();
                }).then(res => {
                this.Topics = res.topics;
                this.Feeds = res.feeds;
                this.loading = false;
            })  .catch(error => {
                this.loading = false;
                console.error('There was an error!', error);
            });
        },
        subscribe(feed) {
            this.loading = true;
            const requestOptions = {
                method: "POST",
                headers: { "Content-Type": "application/json" },

                body: JSON.stringify(feed)
            };
            fetch("/feeds/subscribe", requestOptions)
                .then(
                    response => {
                        console.log(feed);
                        this.loading = false;
                        this.search(this.topic);
                    }
                );
        },
        unsubscribe(feed) {
            this.loading = true;
            const requestOptions = {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(feed)
            };
            console.log(JSON.stringify(feed));
            fetch("/api/v1/feeds/delete", requestOptions)
                .then(
                    response => {
                        this.loading = false;
                        this.search(this.topic);
                    }
                )
                .then(data => (this.postId = data.id));
        },
        setTopic(topic) {
            this.topic = topic;
            this.search(topic);
            console.log(topic);
        },
        checkIfSubscribed(feed) {
            fetch('/feeds/check/' + feed.url)
                .then(res => {
                    return res.json();
                }).then(res => {
            })  .catch(error => {
                console.error('There was an error!', error);
            });
        }
    },
    mounted()
    {
        this.search("laravel");
    }
}
</script>
<style>
.hearth:hover {
    color: red;
}
</style>
