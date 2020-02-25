@extends('layouts.app')

@section('content')

<div class="has-bg-brand is-relative">
    <div class="is-covered-left">
        <div class="hero is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <div class="is-relative" style="z-index: 21">
                        
                        <div class="columns is-mobile is-centered">
                            <div class="column is-10 has-text-centered">
                                <span class="icon has-text-white has-text-centered"><i class="fas fa-bug fa-3x"></i></span>
                                <h1 class="title has-text-white is-size-huge has-text-centered is-hidden-mobile" style="font-size: 140px">404</h1>
                                <h1 class="title has-text-white is-size-huge has-text-centered is-hidden-desktop">404</h1>
                                <h1 class="title has-text-white is-size-3 is-size-5-mobile has-text-centered">{{ __('general.404') }}</h1>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection