@extends('marketing::layouts.app')

@section('title', __('Medium'))

@section('heading')
    {{ __('Create your post on medium') }}
@endsection

@section('content')
    <!-- The nav !-->
    @include('social::partials.nav')



    <!-- Cards !-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Create post') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('social.medium.shareAction') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title">{{ __('Image') }}</label>
                            <input type="text" name="image" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="content">{{ __('Content') }}</label>
                            <textarea name="body" id="content" class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Share</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
    <script>
        const easyMDE = new EasyMDE({element: document.getElementById('content')});
    </script>
@endsection
