require('./bootstrap');

window.Vue = require('vue');

import Buefy from 'buefy';
Vue.use(Buefy);

Vue.component('nav-search-widget', require('./components/navSearchWidget.vue').default);