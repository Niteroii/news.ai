@extends('marketing::layouts.app')

@section('title', __('Social Twitter'))

@section('heading')
    {{ __('Social Sharing Twitter') }}
@endsection

@section('content')
    <!-- The nav !-->
    @include('social::partials.nav')



    <!-- Cards !-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Twitter Share') }}</h3>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('social.twitter.shareAction') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="message">{{ __('Message') }}</label>
                            <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Share</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
