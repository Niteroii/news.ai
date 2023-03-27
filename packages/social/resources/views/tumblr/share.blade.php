@extends('marketing::layouts.app')

@section('title', __('Social Sharing tumblr'))

@section('heading')
    {{ __('Social Sharing tumblr') }}
@endsection

@section('content')
    <!-- The nav !-->
    @include('social::partials.nav')



    <!-- Cards !-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('tumblr Share') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="col-md-12">
                        <form action="{{ route('social.tumblr.shareAction') }}" method="post">
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
                                <textarea name="body" id="summernote" class="form-control" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Share</button>
                        </form>
                    </div>

            </div>
        </div>

    </div>
        <!-- include summernote css/js -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#summernote').summernote();
        });
    </script>
@endsection
