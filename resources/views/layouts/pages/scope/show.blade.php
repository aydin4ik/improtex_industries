@extends('layouts.app')

@section('content')
<div class="section has-bg-striped m-t-50 p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
    <div class="container">
        <div class="box p-b-150">
            <div class="header m-t-50">
                <h1 class="subtitle is-size-2 is-capitalized has-text-centered has-text-weight-bold">
                    {{ $scope->title}}
                </h1>
            </div>

            <div class="preview m-t-50">
                <div class="columns is-centered">
                    <div class="column is-10">
                        <figure class="image is-2by1">
                            <img class="is-rounded-all" src="{{ Voyager::image( $scope->image ) }}" alt="{{ $scope->title }}">
                        </figure>
                    </div>
                </div>                
            </div>

            <div class="content m-t-50">
                <div class="columns is-centered">
                    <div class="column is-10">
                        <article>
                            {!! $scope->body !!}
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
                                {{ $scope->created_at->diffForHumans() }}
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