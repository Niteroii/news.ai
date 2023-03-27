@extends('marketing::layouts.app')

@section('title', __('Social Sharing Tumblr'))

@section('heading')
    {{ __('Social Sharing Tumblr') }}
@endsection

@section('content')
    <!-- The nav !-->
    @include('social::partials.nav')



    <!-- Cards !-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Tumblr Login') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('social.tumblr.login') }}" class="btn btn-info">
                        Login with Tumblr
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
