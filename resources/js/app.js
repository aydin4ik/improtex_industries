require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
Vue.use(Buefy);

import VueAwesomeSwiper from 'vue-awesome-swiper';
Vue.use(VueAwesomeSwiper);


Vue.component('nav-search-widget', require('./components/menu/navSearchWidget.vue').default);
Vue.component('modal-widget', require('./components/modalWidget.vue').default);
Vue.component('counter-widget', require('./components/counterWidget.vue').default);
Vue.component('slider-widget', require('./components/sliderWidget.vue').default);
Vue.component('slider-mobile', require('./components/sliderMobile.vue').default);
Vue.component('thumb-gallery', require('./components/thumbGallery.vue').default);
Vue.component('certificate-slider-mobile', require('./components/certificateSliderMobile.vue').default);