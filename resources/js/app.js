require('./bootstrap');

import Vue from 'vue';

Vue.component('default-page', require('./pages/DefaultPage.vue').default);

const app = new Vue({
    el: '#app',
});
