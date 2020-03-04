@extends('layouts.app')

@php
    if (Voyager::translatable($project)) {
        $originalProject = $project;
        $project = $project->translate(app()->getLocale());
    }
@endphp

@section('title')
    {{ ucfirst($project->title) }} / Improtex Industries
@endsection

@section('metatags')
    <meta property="og:title" content="{{ $project->title }}">
    <meta property="og:description" content="{{ $project->excerpt }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="{{ app()->getLocale() }}_{{ strtoupper(app()->getLocale()) }}">
    <meta property="og:site_name" content="Improtex Industries">
    <meta property="article:published_time" content="{{ $project->created_at }}">
    <meta property="og:image" content="{{ Voyager::image( $project->image ) }}">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="550">
@endsection

@section('content')

<div id="post">

    <div class="section has-bg-striped p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
        <div class="container">

            <div class="box is-paddingless p-b-150">

                <div class="preview">
                    @if ($originalProject->image)
                        <figure class="image is-2by1">
                        <img class="is-rounded-small" src="{{ Voyager::image( $originalProject->thumbnail('huge') ) }}" alt="{{ $project->title }}">
                        </figure>
                    @else
                        <figure class="image is-2by1">
                        <img class="is-rounded-small" src={{ asset('images/no-image.svg') }}>   
                        </figure>
                    @endif
                </div>

                

                <div class="content m-t-50">
                    <div class="columns is-centered">
                        
                        <div class="column is-10">
                            <div class="details">
                                <h1 class="title is-size-4">{{ $project->title }}</h1>
                                <p class="m-b-0 is-size-6">{{ __('general.projectScope') }}</p>
                                <p class="m-b-0 is-size-6 has-text-weight-medium">{{ $project->scope }}</p>
                                <hr class="m-t-5 m-b-5">
                                <p class="m-b-0 is-size-6">{{ __('general.projectContractor') }}</p>
                                <p class="m-b-0 is-size-6 has-text-weight-medium">{{ $project->contractor }}</p>
                                <hr class="m-t-5 m-b-5">
                                <p class="m-b-0 is-size-6">{{ __('general.projectStatus') }}</p>
                                <p class="m-b-0 is-size-6 has-text-weight-medium">{{ $project->progress }}</p>
                                <hr class="m-t-5 m-b-5">
                                <p class="m-b-0 is-size-6">{{ __('general.projectDate') }}</p>
                                <p class="m-b-0 is-size-6 has-text-weight-medium">{{ Carbon::parse($project->start_date)->translatedFormat('d F Y') }} / {{ Carbon::parse($project->end_date)->translatedFormat('d F Y') }}</p>
                                <hr class="m-t-5 m-b-5">
                            </div>
                            <article class="m-t-50">
                                {!! $project->body !!}
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
                                    {{ $originalProject->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="social is-pulled-right">
                                <div class="columns is-vcentered">
                                    <div class="column is-narrow">
                                        <span>{{ __('general.share') }}</span>
                                    </div>
                                    <div class="column">
                                        <social-sharing class="is-inline"
                                            url="{{ url()->current() }}"
                                            title="{{ $project->title }}"
                                            description="{{ $project->excerpt }}"
                                            quote="{{ $project->excerpt }}"
                                            inline-template>
                                            <div>
                                                <network network="vk">
                                                    <button class="button is-white">
                                                        <span class="icon">
                                                            <i class="fab fa-vk"></i>
                                                        </span>
                                                    </button>
                                                </network>                                    
                                                <network network="facebook">
                                                    <button class="button is-white">
                                                        <span class="icon">
                                                            <i class="fab fa-facebook-f"></i>
                                                        </span>
                                                    </button>
                                                </network>                                    
                                                <network network="twitter">
                                                    <button class="button is-white">
                                                        <span class="icon">
                                                            <i class="fab fa-twitter"></i>
                                                        </span>
                                                    </button>
                                                </network>                                   
                                            </div>
                                        </social-sharing>
                                    </div>
                                </div>
                                
                                
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

            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        @if ($prev)
                            <a href="{{ route('projects.show', $prev->slug) }}" class="link is-prev is-size-3 is-capitalized">
                                <i class="custom-icon-long-arrow-left"></i>
                                <span>{{ __('general.prevProject') }}</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        @if ($next)
                            <a href="{{ route('projects.show', $next->slug) }}" class="link is-next is-size-3 is-capitalized">
                                <span>{{ __('general.nextProject') }}</span>
                                <i class="custom-icon-long-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="has-bg-striped is-relative has-background-white-bis p-t-0 is-hidden-desktop">
        <div class="preview">
            @if ($originalProject->image)
                <figure class="image is-5by3 m-t-20">
                    <img src={{ Voyager::image( $originalProject->thumbnail('big') ) }}>
                </figure>
            @else
                <figure class="image is-5by3 m-t-30">
                    <img src={{ asset('images/no-image.svg') }}>   
                </figure>
            @endif
            <div class="notification is-primary is-radiusless is-capitalized has-text-weight-bold p-t-10 p-b-10 p-l-10 p-r-10 is-size-7 m-b-0">
                <span>
                    {{ $project->title }}
                </span>
                <span class="is-pulled-right">
                    <i class="fas fa-info-circle"></i>
                </span>
            </div>
        </div>

        <div class="box is-relative is-radiusless">      
            <div class="details">
                    <p class="m-b-0 is-size-7">{{ __('general.projectScope') }}</p>
                    <p class="m-b-0 is-size-7 has-text-weight-medium">{{ $project->scope }}</p>
                    <hr class="m-t-5 m-b-5">
                    <p class="m-b-0 is-size-7">{{ __('general.projectContractor') }}</p>
                    <p class="m-b-0 is-size-7 has-text-weight-medium">{{ $project->contractor }}</p>
                    <hr class="m-t-5 m-b-5">
                    <p class="m-b-0 is-size-7">{{ __('general.projectStatus') }}</p>
                    <p class="m-b-0 is-size-7 has-text-weight-medium">{{ $project->progress }}</p>
                    <hr class="m-t-5 m-b-5">
                    <p class="m-b-0 is-size-7">{{ __('general.projectDate') }}</p>
                    <p class="m-b-0 is-size-7 has-text-weight-medium">{{ Carbon::parse($project->start_date)->translatedFormat('d F Y') }} / {{ Carbon::parse($project->end_date)->translatedFormat('d F Y') }}</p>
                    <hr class="m-t-5 m-b-5">
            </div>
            <div class="content is-mobile is-relative is-small m-t-15">
                <article>
                    {!! $project->body !!}
                </article>
            </div>

            <div class="end">
                <hr class="m-t-10">

                <div class="columns is-mobile is-vcentered">
                    <div class="column is-half has-text-left is-size-7">
                        <span class="icon">
                            <i class="far fa-calendar-alt"></i>
                        </span>
                        <span>{{ $originalProject->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="column has-text-right">
                        <div class="social">
                            <button class="button is-white" @click="showSocial = true">
                                <span class="is-capitalized is-size-7">{{ __('general.share') }}</span>
                                <span class="icon is-size-6">
                                    <i class="fas fa-share"></i>
                                </span>
                            </button>

                        </div>
                    </div>   
                </div>
                            
                <transition name="slide-up-fade">
                    <div class="notification" ref="social-mobile" v-if="showSocial">
                        <social-sharing url="{{ url()->current() }}"
                            title="{{ $project->title }}"
                            description="{{ $project->excerpt }}"
                            quote="{{ $project->excerpt }}"
                            inline-template>
                            <div>
                                <div class="columns is-mobile is-centered">
                                    <div class="column is-4 has-text-centered">
                                        <network network="vk">
                                            <button class="button is-light">
                                                <span class="icon">
                                                    <i class="fab fa-vk"></i>
                                                </span>
                                            </button>
                                        </network>                                    
                                    </div>
                                    <div class="column is-4 has-text-centered">
                                        <network network="facebook">
                                            <button class="button is-light">
                                                <span class="icon">
                                                    <i class="fab fa-facebook-f"></i>
                                                </span>
                                            </button>
                                        </network>                                    
                                    </div>
                                    <div class="column is-4 has-text-centered">
                                        <network network="twitter">
                                            <button class="button is-light">
                                                <span class="icon">
                                                    <i class="fab fa-twitter"></i>
                                                </span>
                                            </button>
                                        </network>                                   
                                    </div>
                                    
                                </div>
                            </div>
                        </social-sharing>

                    </div>
                </transition>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    var post = new Vue({
        el: '#post',
        data: {
            showSocial: false,
        }
    });
</script>
    
@endsection