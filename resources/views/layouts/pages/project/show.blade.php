@extends('layouts.app')

@section('content')
@php
    if (Voyager::translatable($project)) {
        $originalproject = $project;
        $project = $project->translate(app()->getLocale());
    }
@endphp
<div id="post">

    <div class="section has-bg-striped p-t-50 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
        <div class="container">

            <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
                <h1 class="title is-uppercase is-size-3 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ $project->title }}</h1>
            </div>

            <div class="box is-paddingless p-b-150">

                <div class="preview">
                    <figure class="image is-2by1">
                        <img class="is-rounded-small" src="{{ Voyager::image( $project->image ) }}" alt="{{ $project->title }}">
                    </figure>
                </div>

                

                <div class="content m-t-50">
                    <div class="columns is-centered">
                        
                        <div class="column is-10">
                            <div class="details is-clearfix">
                                <div class="keys is-pulled-left has-text-weight-light">
                                    <p class="m-b-0 is-size-5">scope</p>
                                    <p class="m-b-0 is-size-5">contractor</p>
                                    <p class="m-b-0 is-size-5">status</p>
                                    <p class="m-b-0 is-size-5">date</p>
                                </div>
                                <div class="values m-l-200 has-text-weight-medium is-capitalized">
                                    <p class="m-b-0 is-size-5">{{ $project->scope }}</p>
                                    <p class="m-b-0 is-size-5">{{ $project->contractor }}</p>
                                    <p class="m-b-0 is-size-5">{{ $project->progress }}</p>
                                    <p class="m-b-0 is-size-5">{{ Carbon::parse($project->start_date)->translatedFormat('d F Y') }} / {{ Carbon::parse($project->end_date)->translatedFormat('d F Y') }}</p>
                                </div>
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
                                    {{ $originalproject->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="social is-pulled-right">
                                <div class="columns is-vcentered">
                                    <div class="column is-narrow">
                                        <span>share this on</span>
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
                                <span>previous project</span>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        @if ($next)
                            <a href="{{ route('projects.show', $next->slug) }}" class="link is-next is-size-3 is-capitalized">
                                <span>next project</span>
                                <i class="custom-icon-long-arrow-right"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="has-bg-striped is-relative has-background-white-bis p-t-50 is-hidden-desktop">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
            <h1 class="title is-uppercase is-size-6-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ $project->title }}</h1>
        </div>

        <div class="preview">
            <figure class="image is-5by3 m-t-20">
                <img src="{{ Voyager::image( $project->image ) }}">
            </figure>
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
                    <p class="m-b-0 is-size-7">scope</p>
                    <p class="m-b-0 is-size-7 has-text-weight-medium">{{ $project->scope }}</p>
                    <hr class="m-t-5 m-b-5">
                    <p class="m-b-0 is-size-7">contractor</p>
                    <p class="m-b-0 is-size-7 has-text-weight-medium">{{ $project->contractor }}</p>
                    <hr class="m-t-5 m-b-5">
                    <p class="m-b-0 is-size-7">status</p>
                    <p class="m-b-0 is-size-7 has-text-weight-medium">{{ $project->progress }}</p>
                    <hr class="m-t-5 m-b-5">
                    <p class="m-b-0 is-size-7">date</p>
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
                        <span>{{ $originalproject->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="column has-text-right">
                        <div class="social">
                            <button class="button is-white" @click="showSocial = true">
                                <span class="is-capitalized is-size-7">поделиться</span>
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