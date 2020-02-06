@extends('layouts.app')

@section('content')
<div class="section has-bg-striped m-t-100 p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
    <div class="container">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless">
            <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">products</h1>
        </div>

        <div class="columns is-multiline is-centered">
            @foreach ($products as $product)
                <div class="column is-4">
                    <a class="box is-paddingless" href="{{ route('products.show', $product->slug, true, null) }}">
                        <figure class="image is-5by3">
                            <img class="is-rounded-small" src="{{ Voyager::image( $product->image ) }}">
                        </figure>
                        <article class="notification is-white p-l-50 p-r-50">
                            <h4 class="title is-5">{{ $product->title }}</h4>
                            <h6 class="subtitle is-6 has-text-grey-light m-t-10">{{ $product->excerpt }}</h6>
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
            <h1 class="title is-uppercase is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">product of business</h1>
        </div>

        <div class="columns is-multiline is-centered">
            @foreach ($products as $product)
                <div class="column is-4">
                    <a class="box is-paddingless is-radiusless" href="#">
                        <figure class="image is-5by3">
                            <img src="{{ Voyager::image( $product->image ) }}">
                        </figure>
                        <article class="notification is-white p-l-15 p-r-15">
                            <h4 class="title is-6">{{ $product->title }}</h4>
                            <h6 class="subtitle is-7 has-text-grey-light m-b-5">{{ $product->excerpt }}</h6>
                            <h6 class="link is-size-7">learn more</h6>
                        </article>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection