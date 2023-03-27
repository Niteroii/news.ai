@extends('marketing::layouts.app')

@section('title', __('Social Sharing'))

@section('heading')
    {{ __('Social Sharing') }}
@endsection

@section('content')
    <!-- The nav !-->
    @include('social::partials.nav')



    <!-- Cards !-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Social Sharing') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                 <p>Share your content with the world!</p>
                </div>
            </div>
        </div>

    </div>
@endsection
