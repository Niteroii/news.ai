@extends('marketing::layouts.app')

@section('title', __('Social Sharing Linkedin'))

@section('heading')
    {{ __('Social Sharing Linkedin') }}
@endsection

@section('content')
    <!-- The nav !-->
    @include('social::partials.nav')



    <!-- Cards !-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('LinkedIn Share') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('social.github.shareAction') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Message') }}</label>
                            <textarea name="message" class="form-control" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Share</button>
                    </form>

            </div>
        </div>

    </div>
@endsection
