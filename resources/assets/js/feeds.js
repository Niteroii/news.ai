
import {createApp} from 'vue';

import FindFeeds from './vue/Feeds.vue';


import InfiniteLoading from "v3-infinite-loading";

import "v3-infinite-loading/lib/style.css"; //required if you're not going to override default slots

const app = createApp(FindFeeds);

app.component("infinite-loading", InfiniteLoading);

app.mount('#feeds');
