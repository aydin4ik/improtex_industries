@extends('layouts.app')

@section('title')
    {{ ucfirst(__('general.about')) }} / Improtex Industries
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
@php
    if (Voyager::translatable($about)) {
        $originalAbout = $about;
        $about = $about->translate(app()->getLocale());
    }
@endphp
<div class="has-bg-striped is-relative has-background-white-bis p-t-50 is-hidden-desktop">
    <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
        <h1 class="title is-uppercase is-size-3-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.about') }}</h1>
    </div>
    <div class="columns is-mobile">
        <div class="column is-11">
            <div class="notification is-primary is-radiusless">
                <h2 class="title is-size-4-mobile has-text-weight-normal">{{ $about->title }}</h2>
                <h3 class="subtitle is-size-5-mobile has-text-weight-light has-text-grey-lighter m-t-25">{{ $about->subtitle }}</h3>
            </div>
        </div>
    </div>

    @if ($originalAbout->image)
        <figure class="image is-3by2">
        <img src={{ Voyager::image( $originalAbout->thumbnail('big') ) }}>
        </figure>
    @else
        <figure class="image is-3by2">
        <img src={{ asset('images/no-image.svg') }}>   
        </figure>
    @endif
    <div class="notification is-primary is-radiusless is-capitalized has-text-weight-bold p-t-10 p-b-10 p-l-10 p-r-10 is-size-7 m-b-0">
        <span>
            improtex industries
        </span>
        <span class="is-pulled-right">
            <i class="fas fa-info-circle"></i>
        </span>
    </div>
    <div class="notification is-grey-light is-radiusless is-capitalized p-t-10 p-b-10 p-l-10 is-size-7">
        <p class="has-text-weight-bold">
          {{$about->image_title}}
        </p>
        <p class="has-text-weight-light">
            {{$about->image_description}}
        </p>
    </div>
</div>
<div class="has-background-white-bis is-hidden-desktop">
    <div class="notification has-background-transparent is-radiusless">
        <h3 class="subtitle is-size-6-mobile has-text-weight-light has-text-grey m-t-25">{!! nl2br(e($about->body)) !!}</h3>
    </div>
</div>

<div class="section has-bg-striped m-t-100 p-t-100 is-relative has-background-white-bis is-hidden-mobile">
    <div class="container">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
            <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.about') }}</h1>
        </div>
    </div>

    <div class="container">
        <div class="columns is-centered">
            
            <div class="column is-11">
                <div class="box p-t-100 p-l-50 p-r-50 p-b-100">
                    <div class="columns is-centered">
                        <div class="column is-11">
                            <div class="notification is-primary">
                                <h2 class="title is-size-1 m-b-50">
                                    {{ $about->title }}
                                </h2>
                                <h4 class="subtitle is-size-4 has-text-weight-light">
                                    {{ $about->subtitle }}
                                </h4>
                            </div>
                        </div>
                        <div class="column is-4"></div>
                    </div>

                    <div class="columns m-t-50">
                        <div class="column is-6">
                            <div class="content">
                                {!! nl2br(e($about->body)) !!}
                            </div>
                        </div>
                        <div class="column is-12">
                            <div class="columns is-vcentered">
                                <div class="column is-7">
                                    @if ($originalAbout->image)
                                        <figure class="image is-3by2">
                                        <img class="is-rounded-all" src={{ Voyager::image( $originalAbout->thumbnail('big') ) }}>
                                        </figure>
                                    @else
                                        <figure class="image is-3by2">
                                        <img src={{ asset('images/no-image.svg') }}>   
                                        </figure>
                                    @endif                            
                                </div>
                                <div class="column is-narrow">
                                    <h6 class="title is-size-6 text-rotated-90">
                                        <span class="has-text-primary has-text-weight-bold">{{$about->image_title}}</span>
                                        <span class="has-text-black">/ {{$about->image_description}}</span> 
                                    </h6>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>                    
                </div>                
            </div>
        </div>
        
        
    </div>


</div>

{{-- Counters start --}}
<div class="section has-background-white-bis is-hidden-mobile">
    <div class="container-fluid">

        <div class="columns is-relative is-centered is-multiline is-mobile" id="counters" ref="counters">
            @foreach ($features as $feature)
            @php
            if (Voyager::translatable($feature)) {
                $feature = $feature->translate(app()->getLocale());
            }
            @endphp
            <div class="column is-4 has-text-centered">
                <div>
                    <p class="heading">
                        <span class="is-size-huge has-text-weight-bold has-text-primary">
                            <counter-widget :end-value="{{ $feature->qty }}" :anim-duration="1400" ref="counter-widget"/>
                        </span>
                        <span class="is-size-1 is-lowercase has-text-weight-bold">{{ $feature->measure }}</span>
                    </p>
                    <p class="title is-size-5 is-capitalized">{{ $feature->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
{{-- Counters end --}}
{{-- Counters Mobile --}}
<h6 class="subtitle is-size-6 is-capitalized has-text-weight-normal has-text-centered m-t-25 is-hidden-desktop">{{ __('general.features') }}</h6>
<div class="columns is-relative is-centered is-multiline is-mobile is-hidden-desktop" id="counters-mobile" ref="counters">
    @foreach ($features as $feature)
    @php
    if (Voyager::translatable($feature)) {
        $feature = $feature->translate(app()->getLocale());
    }
    @endphp
    <div class="column is-half-mobile has-text-centered">
        <div>
            <p class="heading">
                <span class="is-size-huge is-size-3-mobile has-text-weight-bold has-text-primary">
                    <counter-widget :end-value="{{ $feature->qty }}" :anim-duration="2000" ref="counter-widget"/>
                </span>
                <span class="is-size-1 is-size-6-mobile is-lowercase has-text-weight-bold">{{ $feature->measure }}</span>
            </p>
            <p class="title is-size-5 is-size-7-mobile is-capitalized has-text-weight-light">{{ $feature->name }}</p>
        </div>
    </div>
    @endforeach
</div>
    {{-- Slides Start --}}
    @foreach ($slides as $slide)
    @php
        
        $slide->imageMobile = Voyager::image( $slide->thumbnail('cropped'));
        $slide->image = Voyager::image( $slide->thumbnail('main') );

        if (Voyager::translatable($slide)) {
            $slide->title = $slide->getTranslatedAttribute('title', app()->getLocale());
        }
    @endphp
    @endforeach
    <div class="has-background-white-bis" id="slides">
        <div class="container-fluid section" v-if="!isMobile">
            <slider-widget :slide-images="{{ $slides }}"></slider-widget>
        </div>
        <div v-else>
            <slider-mobile :slide-images="{{ $slides }}"></slider-mobile>
        </div>


    </div>
    {{-- Slides End --}}

    {{-- Certificates Start --}}
    
<div class="has-background-white-bis" id="certificates">
    <div class="section has-bg-striped is-relative m-t-100 p-t-100 is-hidden-mobile">
        <div class="container">
            <div class="notification has-background-transparent is-radiusless has-left-border-wide is-absolute is-paddingless top-140">
                <h1 class="title is-uppercase is-size-1 is-size-4-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.certificates') }}</h1>
            </div>
        </div>
        <div class="container">
            <div class="columns is-centered is-vcentered is-mobile is-multiline">
                @foreach ($certificates as $certificate)
                @if ($certificate->orientation == "portrait")
        
                <div class="column is-2-desktop is-half-mobile">
                    <a class="box is-paddingless p-t-5 p-b-5 p-l-5 p-r-5" @click.prevent="openModal(); currentIndex={{ $loop->index }}"> 
                        <figure class="image is-3by4">
                            <img src="{{ Voyager::image( $certificate->image ) }}">
                        </figure>
                    </a>
                </div>
                @else
                <div class="column is-3-desktop is-full-mobile">
                    <a class="box is-paddingless p-t-5 p-b-5 p-l-5 p-r-5" @click.prevent="openModal(); currentIndex={{ $loop->index }}">
                        <figure class="image is-5by3">
                            <img src="{{ Voyager::image( $certificate->image ) }}">
                        </figure>
                    </a>
                </div>

                @endif
                @php
                    $certificate->image = Voyager::image( $certificate->image );
                @endphp
                @endforeach
            </div>
        </div>
        
        <div class="modal" :class="{ 'is-active': showModal }">
            <div class="modal-background" v-on:click="showModal = false"></div>
            <div class="modal-card">
                <thumb-gallery ref="gallery" :gallery-images="{{ $certificates }}" :current-Index="currentIndex"></thumb-gallery>
            </div>
        </div>
    </div>
    <div class="m-t-25 is-hidden-desktop">
        <div class="notification has-background-transparent is-radiusless has-left-border-wide is-paddingless">
            <h1 class="title is-uppercase is-size-3-mobile has-text-weight-bold p-t-10 p-b-10 p-l-15">{{ __('general.certificates') }}</h1>
        </div>
        <certificate-slider-mobile :slide-images="{{ $certificates }}"></certificate-slider-mobile>
    </div>
</div>
{{-- Partners Desktop start --}}
<div class="section p-b-100 has-background-white-bis is-hidden-mobile">
    <div class="container">
        <h6 class="title is-size-5 is-uppercase has-text-weight-normal has-text-centered m-b-50">{{ __('general.partners') }}</h6>
        <div class="columns is-multiline is-centered">
            @foreach ($partners as $partner)
                @if ($partner->category == 'partner')
                    <div class="column is-2 has-text-centered">
                        <a href=" {{ $partner->url }}" target="blank" class="link">
                            <img src="{{ Voyager::image( $partner->image ) }}" class="grayscale partner">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>

        <h6 class="title is-size-5 is-uppercase has-text-weight-normal has-text-centered m-t-50 m-b-50">{{ __('general.capacities') }}</h6>
        <div class="columns is-multiline is-centered">
            @foreach ($partners as $partner)
                @if ($partner->category == 'manufacturer')
                    <div class="column is-2 has-text-centered">
                        <a href=" {{ $partner->url }}" target="blank" class="link">
                            <img src="{{ Voyager::image( $partner->image ) }}" class="grayscale partner">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
{{-- Partner Desktop End --}}

@include('layouts.includes.search')

{{-- Partner Mobile Start --}}
<div class="has-background-white-bis is-hidden-desktop m-t-25">
    <div class="container">
        <h6 class="title is-size-6-mobile is-uppercase has-text-weight-normal has-text-centered">factory's main partners</h6>
        <div class="columns is-multiline is-centered is-mobile">
            @foreach ($partners as $partner)
                @if ($partner->category == 'partner')
                    <div class="column is-5 has-text-centered">
                        <a href=" {{ $partner->url }}" target="blank" class="link">
                            <img src="{{ Voyager::image( $partner->image ) }}" class="partner is-mobile ">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>

        <h6 class="title is-size-6-mobile is-uppercase has-text-weight-normal has-text-centered m-t-25">factory's technical capacities</h6>
        <div class="columns is-multiline is-centered is-mobile">
            @foreach ($partners as $partner)
                @if ($partner->category == 'manufacturer')
                    <div class="column is-5 has-text-centered">
                        <a href=" {{ $partner->url }}" target="blank" class="link">
                            <img src="{{ Voyager::image( $partner->image ) }}" class="partner is-mobile">
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
</div>
{{-- Partner Mobile End --}}



@endsection

@section('scripts')
<script>
var counters = new Vue({
    el: '#counters',
    computed: {
        elOfset () {
            return this.$refs.counters.offsetTop
        }
    },
    methods: {
        onScroll () {
            const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop; 

            // Because of momentum scrolling on mobiles, we shouldn't continue if it is less than zero
            if (currentScrollPosition < 0) {
            return
            }

            if( currentScrollPosition >= this.elOfset - 300 ){
                this.$children.forEach(child => {
                    child.animateValue();
                    child.done = true;
                });
            }
        },
        
    },
    mounted () {
        window.addEventListener('scroll', this.onScroll)
    },
    beforeDestroy () {
        window.removeEventListener('scroll', this.onScroll)
    }
});        

var countersMobile = new Vue({
    el: '#counters-mobile',
    computed: {
        elOfset () {
            return this.$refs.counters.offsetTop
        }
    },
    methods: {
        onScroll () {
            const currentScrollPosition = window.pageYOffset || document.documentElement.scrollTop; 

            // Because of momentum scrolling on mobiles, we shouldn't continue if it is less than zero
            if (currentScrollPosition < 0) {
            return
            }

            if( currentScrollPosition >= this.elOfset - 300 ){
                this.$children.forEach(child => {
                    child.animateValue();
                    child.done = true;
                });
            }
        },
        
    },
    mounted () {
        window.addEventListener('scroll', this.onScroll)
    },
    beforeDestroy () {
        window.removeEventListener('scroll', this.onScroll)
    }
});  

var slides = new Vue({
    el: '#slides',
    computed: {
        isMobile() {
            if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                return true
            } else {
                return false
            }
        }
    }
});

var certificates = new Vue({
    el: '#certificates',
    data: {
        showModal: false,
        currentIndex: '',
    },
    methods: {
        openModal ( e, index ) {
            this.showModal = true;
            this.$refs.gallery.refresh();
        }
    },
    
});
</script>
@endsection