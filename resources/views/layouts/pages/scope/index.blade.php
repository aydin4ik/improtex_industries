@extends('layouts.app')

@section('title')
    {{ ucfirst(__('general.scope')) }} / Improtex Industries
@endsection

@section('content')
<div class="section has-bg-striped m-t-200 p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
    <div class="container">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
            <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.scope') }}</h1>
        </div>

        <div class="columns is-multiline">
            @foreach ($scopes as $scope)
                @php
                    if (Voyager::translatable($scope)) {
                        $originalScope = $scope;
                        $scope = $scope->translate(app()->getLocale());
                    }
                @endphp
                <div class="column is-4">
                    <a class="box is-paddingless" href="{{ route('scope.show', $scope->slug, true, null) }}">
                        @if ($scope->image)
                            <figure class="image is-5by3">
                            <img src={{ Voyager::image( $originalScope->thumbnail('card') ) }}>
                            </figure>
                        @else
                            <figure class="image is-5by3">
                            <img src={{ asset('images/no-image.svg') }}>   
                            </figure>
                        @endif
                        <article class="notification is-white p-l-50 p-r-50">
                            <h4 class="title is-5 is-capitalized">{{ $scope->title }}</h4>
                            <h6 class="subtitle is-6 has-text-grey-light m-t-10">{{ Str::limit($scope->excerpt, 200) }}</h6>
                            <h6 class="link is-size-6">{{ __('general.more') }}</h6>
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
            <h1 class="title is-uppercase is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.scope') }}</h1>
        </div>

        <div class="columns is-multiline is-centered">
            @foreach ($scopes as $scope)
            @php
                if (Voyager::translatable($scope)) {
                    $originalScope = $scope;
                    $scope = $scope->translate(app()->getLocale());
                }
            @endphp
                <div class="column is-4">
                    <a class="box is-paddingless is-radiusless" href="{{ route('scope.show', $scope->slug, true, null) }}">
                        @if ($scope->image)
                            <figure class="image is-5by3">
                            <img src={{ Voyager::image( $originalScope->thumbnail('card') ) }}>
                            </figure>
                        @else
                            <figure class="image is-5by3">
                            <img src={{ asset('images/no-image.svg') }}>   
                            </figure>
                        @endif
                        <article class="notification is-white p-l-15 p-r-15">
                            <h4 class="title is-6">{{ $scope->title }}</h4>
                            <h6 class="subtitle is-7 has-text-grey-light m-b-5">{{ $scope->excerpt }}</h6>
                            <h6 class="link is-size-7">{{ __('general.more') }}</h6>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection