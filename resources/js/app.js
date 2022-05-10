require('./bootstrap');

import Vue from 'vue';
import router from './router/index.js';

// Pages
Vue.component('default-page', require('./pages/DefaultPage.vue').default);

// Component
Vue.component('header-default-component', require('./components/HeaderDefaultComponent.vue').default);
Vue.component('navbar-default-component', require('./components/NavbarDefaultComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});
