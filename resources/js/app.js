require('./bootstrap');

import Vue from 'vue';
import router from './router/index.js';

// Pages
Vue.component('default-page', require('./pages/DefaultPage.vue').default);

// Component
Vue.component('hero-default-component', require('./components/HeroDefaultComponent.vue').default);
Vue.component('header-default-component', require('./components/HeaderDefaultComponent.vue').default);
Vue.component('dropdown-default-component', require('./components/DropdownDefaultComponent.vue').default);
Vue.component('sidebar-default-component', require('./components/SidebarDefaultComponent.vue').default);
Vue.component('menu-default-component', require('./components/MenuDefaultComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});
