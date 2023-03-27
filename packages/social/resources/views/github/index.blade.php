@extends('marketing::layouts.app')

@section('title', __('Social Sharing Github'))

@section('heading')
    {{ __('Social Sharing Github') }}
@endsection

@section('content')
    <!-- The nav !-->
    @include('social::partials.nav')



    <!-- Cards !-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Github Login') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <a href="{{ route('social.github.login') }}" class="btn btn-primary">Login with Github</a>

                </div>
            </div>
        </div>

    </div>
@endsection
