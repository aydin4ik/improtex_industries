@extends('layouts.app')

@section('content')
<div id="posts">
    <div class="section has-bg-striped m-t-200 p-t-100 p-b-100 is-relative has-background-white-bis is-hidden-mobile">
        <div class="container">
            <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
                <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">news</h1>
            </div>

            <div class="columns is-multiline">
                    <div class="column is-11" v-for="item in posts">
                        <a class="box is-relative" :href="item.url">
                            <div class="columns">
                                <div class="column is-9">
                                    <article class="p-l-20">
                                        <h6 class="subtitle is-size-6 has-text-weight-bold is-uppercase">@{{ item.date }}</h6>
                                        <h4 class="title is-5 m-t-20 has-text-weight-medium is-capitalized">@{{ item.title }}</h4>
                                        <h6 class="subtitle is-6 m-t-20 has-text-grey has-text-weight-medium">@{{ item.excerpt }}</h6>
                                        <h6 class="is-white subtitle is-size-6 has-text-weight-bold is-uppercase is-absolute bottom_20 left_40">learn more</h6>
                                    </article>
                                </div>
                                <div class="column is-4 p-t-25 p-b-25">
                                    <figure class="image is-5by3 " style="width:100%; height:100%">
                                        <img class="is-rounded-all" :src="item.image">
                                    </figure>
                                </div>
                            </div>
                            
                            
                        </a>
                    </div>
            </div>
            <div class="level m-t-50">
                <div class="level-item">
                    <a href="#" class="link is-size-3 is-capitalized" @click.prevent="load" v-if="! completed">load more <i class="custom-icon-long-arrow"></i></a>
                        
                    <transition name="slide-down">
                        <div class="notification is-primary" v-if="completed">
                            <span class="title is-size-5">No more data found</span>
                        </div>
                    </transition>
                </div>
            </div>
        </div>
    </div>


</div>
    
@endsection

@section('scripts')
<script>
    var posts = new Vue({
        el: '#posts',
        data: {
            posts: {!! $posts !!},
            completed: false,

        },
        methods: {
            load () {
                axios.post('/news', {offset: this.posts.length})
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