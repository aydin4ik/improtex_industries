@extends('layouts.app')

@section('title')
    {{ ucfirst(__('general.news')) }} / Improtex Industries
@endsection

@section('content')
{{-- no image set for vue--}}

@php
    $noImage = asset('images/no-image.svg');
@endphp

<div id="posts">
    <div class="section has-bg-striped m-t-200 p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
        <div class="container">
            <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
                <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.news') }}</h1>
            </div>

            <div class="columns is-multiline">
                    <div class="column is-11" v-for="post in posts">
                        <a class="box is-relative" :href="post.url">
                            <div class="columns">
                                <div class="column is-9">
                                    <article class="p-l-20">
                                        <h6 class="subtitle is-size-6 has-text-weight-bold is-uppercase">@{{ post.date }}</h6>
                                        <h4 class="title is-5 m-t-20 has-text-weight-medium is-capitalized">@{{ post.title }}</h4>
                                        <h6 class="subtitle is-6 m-t-20 has-text-grey has-text-weight-medium">@{{ post.excerpt }}</h6>
                                        <h6 class="is-white subtitle is-size-6 has-text-weight-bold is-uppercase is-absolute bottom_20 left_40">{{ __('general.more') }}</h6>
                                    </article>
                                </div>
                                <div class="column is-4 p-t-25 p-b-25">
                                    <figure class="image is-5by3 " style="width:100%; height:100%">
                                        <img class="is-rounded-all" :src="post.image" v-if="post.image">
                                        <img class="is-rounded-all" :src="noImage" v-else>
                                    </figure>
                                </div>
                            </div>
                            
                            
                        </a>
                    </div>
            </div>
            <div class="level m-t-50">
                <div class="level-item">
                    <a href="#" class="link is-size-3 is-capitalized" @click.prevent="load" v-if="! completed">{{ __('general.loadMore') }} <i class="custom-icon-long-arrow"></i></a>
                        
                    <transition name="slide-down">
                        <div class="notification is-primary" v-if="completed">
                            <span class="title is-size-5">{{ __('general.noMoreData') }}</span>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </div>

    <div class="has-bg-striped p-t-50 is-relative is-hidden-desktop">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
          <h1 class="title is-uppercase is-size-3-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">news</h1>
        </div>

        <a class="box is-paddingless is-radiusless has-tag is-relative" v-for="post in posts" :href="post.url">
            <figure class="image is-5by3">
                <img :src="post.image" v-if="post.image">
                <img :src="noImage" v-else>
            </figure>
            <article class="notification is-white">
              <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">@{{ post.date }}</h6>
              <h4 class="title is-6">@{{ post.title }}</h4>
              <h6 class="subtitle is-7 has-text-grey-light">@{{ post.excerpt }}</h6>
            </article>
          </a>


          <div class="level m-t-20 is-relative">
            <div class="level-item">
                <a href="#" class="link is-size-5 is-capitalized" @click.prevent="load" v-if="! completed">{{ __('general.loadMore') }} <i class="custom-icon-long-arrow"></i></a>
                    
                <transition name="slide-down">
                    <div class="notification is-primary" v-if="completed">
                        <span class="title is-size-7">{{ __('general.noMoreData') }}</span>
                    </div>
                </transition>
            </div>
        </div>
    </div>


</div>
@include('layouts.includes.search')
@endsection

@section('scripts')
<script>
    var posts = new Vue({
        el: '#posts',
        data: {
            posts: {!! $posts !!},
            noImage: {!! json_encode($noImage) !!},
            currentLocale: "{{ app()->getLocale() }}",
            completed: false,

        },
        methods: {
            load () {
                axios.post('/news', {offset: this.posts.length, locale: this.currentLocale})
                    .then( response => {
                        if(response.data.length){
                            this.posts = this.posts.concat(response.data);
                        }else{
                            this.completed = true
                        }
                    })
            }
        }
    });
</script>
@endsection