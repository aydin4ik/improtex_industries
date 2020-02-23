@extends('layouts.app')

@section('content')

@php
    if (Voyager::translatable($contacts)) {
        $contacts = $contacts->translate(app()->getLocale());
    }
@endphp

<div id="contacts">
    <div class="columns">
        <div class="column is-8">
            <div class="has-bg-brand is-relative">
                <div class="is-covered-left">
                    <div class="hero is-fullheight">
                        <div class="hero-body">
                            <div class="container">
                                <div class="is-relative" style="z-index: 21">
                                    <div class="columns has-text-white is-vcentered">
                                        <div class="column is-narrow is-offset-1">
                                            <span class="icon m-r-15">
                                                <i class="fas fa-map-marker-alt fa-3x"></i>
                                            </span>
                                        </div>
                                        <div class="column is-6">
                                            <h1 class="title has-text-white has-text-weight-bold">
                                                Address
                                            </h1>
                                            <h3 class="subtitle has-text-white is-size-5">
                                                {{ $contacts->address }}
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="columns has-text-white m-t-50 is-vcentered">
                                        <div class="column is-narrow is-offset-1">
                                            <span class="icon m-r-15">
                                                <i class="fas fa-phone-alt fa-3x"></i>
                                            </span>
                                        </div>
                                        <div class="column is-6">
                                            <h1 class="title has-text-white has-text-weight-bold">
                                                Let's talk
                                            </h1>
                                            <h3 class="subtitle has-text-white is-size-5">
                                                {{ $contacts->phone }}
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="columns has-text-white m-t-50 is-vcentered">
                                        <div class="column is-narrow is-offset-1">
                                            <span class="icon m-r-15">
                                                <i class="fas fa-envelope fa-3x"></i>
                                            </span>
                                        </div>
                                        <div class="column is-6">
                                            <h1 class="title has-text-white has-text-weight-bold">
                                                General support
                                            </h1>
                                            <h3 class="subtitle has-text-white is-size-5">
                                                {{ $contacts->email }}
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="columns has-text-white m-t-20">
                                        <div class="column is-narrow is-offset-1">
                                            <a href="{{ $contacts->url }}" class="link is-white is-next is-size-3 is-lowercase has-text-white" target="blank">
                                                <span>show on map</span>
                                                <i class="custom-icon-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="columns is-centered m-t-100 is-multiline">
                <div class="column is-narrow">
                    <div class="has-left-border-wide">
                        <h1 class="title is-uppercase is-size-1 has-text-weight-bold p-t-10 p-b-10 p-l-15">bizimlə əlaqə</h1>
                    </div>
                </div>

                <div class="column is-10 has-text-centered m-t-20 m-b-20">
                    <span class="is-size-5 is-uppercase">kontakt formu vasitəsilə</span>
                </div>

                <div class="column is-10">
                    <form @submit.prevent="" class="contact">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input is-medium" :class="{'is-danger': err.name}" type="text" placeholder="Your name" v-model="name">
                            </div>
                            <p class="help is-danger" v-if="err.name">@{{ err.name[0] }}</p>

                        </div>
                        <div class="field m-t-30">
                            <div class="control has-icons-right">
                                <input class="input is-medium" :class="{'is-danger': err.email}" type="email" placeholder="Your email" v-model="email">
                            </div>
                            <p class="help is-danger" v-if="err.email">@{{ err.email[0] }}</p>
                        </div>

                        <div class="field m-t-30">
                            <div class="control">
                                <textarea class="textarea is-medium" :class="{'is-danger': err.body}" placeholder="Your inqury" v-model="body"></textarea>
                            </div>
                            <p class="help is-danger" v-if="err.body">@{{ err.body[0] }}</p>
                        </div>
                    </form>

                    
                    
                </div>

                <div class="column is-10 has-text-centered">
                    <a href="#" class="link is-next is-size-3 is-lowercase" :class="{'is-inactive': progress}" @click.prevent="send" v-if="!progress">
                        <span>get in touch</span>
                        <i class="custom-icon-long-arrow-right"></i>
                    </a>
                    <button class="button is-primary is-loading is-large" v-if="progress">Loading</button>

                    <transition name="slide-down">
                        <div class="notification  m-t-20" v-if="status">
                            Your message has been sent!
                        </div>
                    </transition>

                    <transition name="slide-down">
                        <div class="notification is-danger  m-t-20" v-if="err">
                            @{{ errMsg }}
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
    var contacts = new Vue({
        el: '#contacts',
        data: {
            name: '',
            email: '',
            body: '',
            status: false,
            err: '',
            errMsg: '',
            progress: false,
        },
        methods:{
            reset () {
                this.name = '';
                this.email = '';
                this.body = '';
            },
            send () {
                this.progress = true;
                axios.post('/contacts', {
                    name: this.name,
                    email: this.email,
                    body: this.body
                })
                .then( response => {
                    this.progress = false;
                    this.status = response.data;
                    this.err = '';
                    this.errMsg = '';
                    this.reset();
                })
                .catch( err => {
                    this.err = err.response.data.errors;
                    this.errMsg = err.response.data.message;
                    this.status = '';
                    this.progress = false;

                })
            }
        }
    });
</script>
@endsection