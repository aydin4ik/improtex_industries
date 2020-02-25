@extends('layouts.app')

@section('title')
    {{ ucfirst(__('general.contactUs')) }} / Improtex Industries
@endsection

@section('content')

@php
    if (Voyager::translatable($contacts)) {
        $contacts = $contacts->translate(app()->getLocale());
    }
@endphp

<div id="contacts">
    <div class="columns is-hidden-mobile is-gapless m-b-0">
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
                                                {{ __('general.address') }}
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
                                                {{ __('general.phone') }}
                                            </h1>
                                            <h3 class="subtitle has-text-white is-size-5">
                                                <a class="has-text-white" href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a>

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
                                                {{ __('general.email') }}
                                            </h1>
                                            <h3 class="subtitle has-text-white is-size-5">
                                                <a class="has-text-white" href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="columns has-text-white m-t-20">
                                        <div class="column is-narrow is-offset-1">
                                            <a href="{{ $contacts->url }}" class="link is-white is-next is-size-3 is-lowercase has-text-white" target="blank">
                                                <span>{{ __('general.map') }}</span>
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
                        <h1 class="title is-uppercase is-size-1 has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.contactUs') }}</h1>
                    </div>
                </div>

                <div class="column is-10 has-text-centered m-t-20 m-b-20">
                    <span class="is-size-5 is-uppercase">{{ __('general.via') }}</span>
                </div>

                <div class="column is-10">
                    <form @submit.prevent="" class="contact">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input is-medium" :class="{'is-danger': err.name}" type="text" placeholder="{{ __('general.yourName') }}" v-model="name">
                            </div>
                            <p class="help is-danger" v-if="err.name">@{{ err.name[0] }}</p>

                        </div>
                        <div class="field m-t-30">
                            <div class="control has-icons-right">
                                <input class="input is-medium" :class="{'is-danger': err.email}" type="email" placeholder="{{ __('general.yourEmail') }}" v-model="email">
                            </div>
                            <p class="help is-danger" v-if="err.email">@{{ err.email[0] }}</p>
                        </div>

                        <div class="field m-t-30">
                            <div class="control">
                                <textarea class="textarea is-medium" :class="{'is-danger': err.body}" placeholder="{{ __('general.yourMessage') }}" v-model="body"></textarea>
                            </div>
                            <p class="help is-danger" v-if="err.body">@{{ err.body[0] }}</p>
                        </div>
                    </form>

                    
                    
                </div>

                <div class="column is-10 has-text-centered">
                    <a href="#" class="link is-next is-size-3 is-lowercase" :class="{'is-inactive': progress}" @click.prevent="send" v-if="!progress">
                        <span>{{ __('general.send') }}</span>
                        <i class="custom-icon-long-arrow-right"></i>
                    </a>
                    <button class="button is-primary is-loading is-large" v-if="progress">{{ __('general.loading') }}</button>

                    <transition name="slide-down">
                        <div class="notification  m-t-20" v-if="status">
                            {{ __('general.sent') }}
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

    {{-- Mobile contacts --}}

    <div class="has-bg-brand is-relative is-hidden-desktop">
        <div class="is-covered-left">
            <div class="hero">
                <div class="hero-body">
                    <div class="container">
                        <div class="is-relative" style="z-index: 21">
                            <div class="columns has-text-white is-vcentered is-mobile">
                                <div class="column is-narrow is-offset-1">
                                    <span class="icon">
                                        <i class="fas fa-map-marker-alt fa-2x"></i>
                                    </span>
                                </div>
                                <div class="column is-6">
                                    <h1 class="title has-text-white has-text-weight-bold is-size-5">
                                        {{ __('general.address') }}
                                    </h1>
                                    <h3 class="subtitle has-text-white is-size-7">
                                        {{ $contacts->address }}
                                    </h3>
                                </div>
                            </div>

                            <div class="columns has-text-white m-t-20 is-vcentered is-mobile">
                                <div class="column is-narrow is-offset-1">
                                    <span class="icon">
                                        <i class="fas fa-phone-alt fa-2x"></i>
                                    </span>
                                </div>
                                <div class="column is-6">
                                    <h1 class="title has-text-white has-text-weight-bold is-size-5">
                                        {{ __('general.phone') }}
                                    </h1>
                                    <h3 class="subtitle has-text-white is-size-7">
                                        <a class="has-text-white" href="tel:{{ $contacts->phone }}">{{ $contacts->phone }}</a>
                                    </h3>
                                </div>
                            </div>

                            <div class="columns has-text-white m-t-20 is-vcentered is-mobile">
                                <div class="column is-narrow is-offset-1">
                                    <span class="icon">
                                        <i class="fas fa-envelope fa-2x"></i>
                                    </span>
                                </div>
                                <div class="column is-6">
                                    <h1 class="title has-text-white has-text-weight-bold is-size-5">
                                        {{ __('general.email') }}
                                    </h1>
                                    <h3 class="subtitle has-text-white is-size-7 is-white">
                                        <a class="has-text-white" href="mailto:{{ $contacts->email }}">{{ $contacts->email }}</a>
                                    </h3>
                                </div>
                            </div>

                            <div class="columns has-text-white m-t-20 is-mobile">
                                <div class="column is-narrow is-offset-1">
                                    <a href="{{ $contacts->url }}" class="link is-white is-next is-size-3 is-lowercase has-text-white is-size-5" target="blank">
                                        <span>{{ __('general.map') }}</span>
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

    <div class="columns is-centered m-t-20 is-multiline is-mobile is-hidden-desktop">
        <div class="column is-narrow">
            <div class="">
                <h1 class="title is-uppercase is-size-4 has-text-weight-bold p-t-10 p-b-10">{{ __('general.contactUs') }}</h1>
            </div>
        </div>

        <div class="column is-10 has-text-centered">
            <span class="is-size-6 is-uppercase">{{ __('general.via') }}</span>
        </div>

        <div class="column is-10">
            <form @submit.prevent="" class="contact">
                @csrf
                <div class="field">
                    <div class="control">
                        <input class="input is-medium is-size-7" :class="{'is-danger': err.name}" type="text" placeholder="{{ __('general.yourName') }}" v-model="name">
                    </div>
                    <p class="help is-danger" v-if="err.name">@{{ err.name[0] }}</p>

                </div>
                <div class="field m-t-30">
                    <div class="control has-icons-right">
                        <input class="input is-medium is-size-7" :class="{'is-danger': err.email}" type="email" placeholder="{{ __('general.yourEmail') }}" v-model="email">
                    </div>
                    <p class="help is-danger" v-if="err.email">@{{ err.email[0] }}</p>
                </div>

                <div class="field m-t-10">
                    <div class="control">
                        <textarea class="textarea is-medium is-size-7" :class="{'is-danger': err.body}" placeholder="{{ __('general.yourMessage') }}" v-model="body"></textarea>
                    </div>
                    <p class="help is-danger" v-if="err.body">@{{ err.body[0] }}</p>
                </div>
            </form>

            
            
        </div>

        <div class="column is-10 has-text-centered m-b-20">
            <a href="#" class="link is-next is-size-5 is-lowercase" :class="{'is-inactive': progress}" @click.prevent="send" v-if="!progress">
                <span>{{ __('general.send') }}</span>
                <i class="custom-icon-long-arrow-right"></i>
            </a>
            <button class="button is-primary is-loading is-large" v-if="progress">{{ __('general.loading') }}</button>

            <transition name="slide-down">
                <div class="notification is-size-7 m-t-20" v-if="status">
                    {{ __('general.sent') }}
                </div>
            </transition>

            <transition name="slide-down">
                <div class="notification is-size-7 is-danger  m-t-20" v-if="err">
                    @{{ errMsg }}
                </div>
            </transition>
            

            
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