@extends('layouts.app')

@section('content')
<div class="section has-bg-striped m-t-200 p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
    <div class="container">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
            <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">scope of business</h1>
        </div>

        <div class="columns is-multiline">
            @foreach ($scopes as $scope)
                <div class="column is-4">
                    <a class="box is-paddingless" href="{{ route('scope.show', $scope->slug, true, null) }}">
                        <figure class="image is-5by3">
                            <img class="is-rounded-small" src="{{ Voyager::image( $scope->image ) }}">
                        </figure>
                        <article class="notification is-white p-l-50 p-r-50">
                            <h4 class="title is-5 is-capitalized">{{ $scope->title }}</h4>
                            <h6 class="subtitle is-6 has-text-grey-light m-t-10">{{ $scope->excerpt }}</h6>
                            <h6 class="link is-size-6">learn more</h6>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="has-bg-striped is-relative has-background-white-bis p-t-50 is-hidden-desktop">
    <div class="container">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
            <h1 class="title is-uppercase is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">scope of business</h1>
        </div>

        <div class="columns is-multiline is-centered">
            @foreach ($scopes as $scope)
                <div class="column is-4">
                    <a class="box is-paddingless is-radiusless" href="{{ route('scope.show', $scope->slug, true, null) }}">
                        <figure class="image is-5by3">
                            <img src="{{ Voyager::image( $scope->image ) }}">
                        </figure>
                        <article class="notification is-white p-l-15 p-r-15">
                            <h4 class="title is-6">{{ $scope->title }}</h4>
                            <h6 class="subtitle is-7 has-text-grey-light m-b-5">{{ $scope->excerpt }}</h6>
                            <h6 class="link is-size-7">learn more</h6>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection