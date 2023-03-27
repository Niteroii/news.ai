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
            <h3 class="card-title">{{ __('LinkedIn Login') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('social.linkedin.login') }}" class="btn btn-info">
                        Login with LinkedIn
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
