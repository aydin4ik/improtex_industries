@extends('layouts.app')

@section('content')
@php
    if (Voyager::translatable($product)) {
        $originalproduct = $product;
        $product = $product->translate(app()->getLocale());
    }
@endphp
<div class="section has-bg-striped m-t-50 p-t-50 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
    <div class="container">

        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
            <h1 class="title is-uppercase is-size-3 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ $product->title }}</h1>
        </div>

        <div class="box is-paddingless p-b-150">

            <div class="preview">
                <figure class="image is-2by1">
                    <img class="is-rounded-small" src="{{ Voyager::image( $product->image ) }}" alt="{{ $product->title }}">
                </figure>
            </div>

            <div class="content m-t-50">
                <div class="columns is-centered">
                    <div class="column is-10">
                        <article>
                            {!! $product->body !!}
                        </article>
                    </div>
                </div>
            </div>

            <div class="end">
                <div class="columns is-centered">
                    <div class="column is-11">
                        <hr class="m-t-50">
                        <div class="date is-pulled-left">
                            <span>
                                <i class="far fa-calendar-alt"></i>
                                {{ $originalproduct->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div class="social is-pulled-right">
                            <span>share this on</span>
                            <span class="icon is-size-4 m-l-20">
                                <i class="fab fa-twitter"></i>
                            </span>
                            <span class="icon is-size-4 m-l-20">
                                <i class="fab fa-facebook-f"></i>
                            </span>
                            <span class="icon is-size-4 m-l-20">
                                <i class="fab fa-vk"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="columns is-centered">
                    <div class="column is-2">
                        <div class="notification is-primary is-paddingless" style="height: 15px; width: 100%"></div>
                    </div>
                    <div class="column is-11">

                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection