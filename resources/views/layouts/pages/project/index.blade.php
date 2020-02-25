@extends('layouts.app')

@section('title')
    {{ ucfirst(__('general.projects')) }} / Improtex Industries
@endsection

@section('content')
<div id="projects">
    <div class="section has-bg-striped m-t-100 p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
        <div class="container">
            <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
                <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.projects') }}</h1>
            </div>

            <div class="columns is-multiline is-centered is-multiline">
                    <div class="column is-12" v-for="item in projects">
                        <a class="box is-paddingless is-relative is-clipped" :href="item.url">
                            
                            <article class="p-l-20 p-r-20 p-t-20 p-b-20  is-relative" style="z-index: 21">
                                <h6 class="subtitle is-size-6 has-text-weight-bold has-text-white is-uppercase">@{{ item.date }}</h6>
                                <h4 class="title is-5 m-t-150 has-text-weight-medium has-text-white is-capitalized">@{{ item.title }}</h4>
                                <h6 class="subtitle is-6 m-t-10 has-text-white is-uppercase">@{{ item.scope }}</h6>
                                <h6 class="is-white subtitle is-size-6 has-text-weight-bold has-text-white is-uppercase">{{ __('general.more') }}</h6>
                            </article>
                            <figure class="image is-2by1 is-covered-left is-absolute left-0 top-0" style="width:100%; height:100%">
                                <img class="is-rounded-small" :src="item.image">
                            </figure>
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
          <h1 class="title is-uppercase is-size-3-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.projects') }}</h1>
        </div>

        <a class="box is-paddingless is-radiusless has-tag is-relative" v-for="project in projects" :href="project.url">
            <figure class="image is-5by3">
                <img :src="project.image">
            </figure>
            <article class="notification is-white">
              <h6 class="subtitle is-7 has-text-primary has-text-weight-bold">@{{ project.date }}</h6>
              <h4 class="title is-6">@{{ project.title }}</h4>
              <h6 class="subtitle is-7 has-text-grey-light">@{{ project.scope }}</h6>
              <h6 class="subtitle is-7 has-text-grey-light">@{{ project.excerpt }}</h6>
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
    
@endsection

@section('scripts')
<script>
    var projects = new Vue({
        el: '#projects',
        data: {
            projects: {!! $projects !!},
            completed: false,

        },
        methods: {
            load () {
                axios.post('/projects', {offset: this.projects.length})
                    .then( response => {
                        if(response.data.length){
                            this.projects = this.projects.concat(response.data);
                        }else{
                            this.completed = true
                        }
                    })
            }
        }
    });
</script>
@endsection