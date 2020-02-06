require('./bootstrap');

window.Vue = require('vue');


import route from 'ziggy'
import { Ziggy } from './ziggy'

Vue.mixin({
    methods: {
        route: (name, params, absolute) => route(name, params, absolute, Ziggy),
    }
});

import Buefy from 'buefy';
Vue.use(Buefy);

import VueAwesomeSwiper from 'vue-awesome-swiper';
Vue.use(VueAwesomeSwiper);

var SocialSharing = require('vue-social-sharing');
Vue.use(SocialSharing);


Vue.component('main-menu', require('./components/menu/mainMenu.vue').default);
Vue.component('nav-search-widget', require('./components/menu/navSearchWidget.vue').default);
Vue.component('modal-widget', require('./components/modalWidget.vue').default);
Vue.component('counter-widget', require('./components/counterWidget.vue').default);
Vue.component('slider-widget', require('./components/sliderWidget.vue').default);
Vue.component('slider-mobile', require('./components/sliderMobile.vue').default);
Vue.component('thumb-gallery', require('./components/thumbGallery.vue').default);
Vue.component('certificate-slider-mobile', require('./components/certificateSliderMobile.vue').default);