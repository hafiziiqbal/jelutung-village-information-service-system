require('./bootstrap');

import Vue from 'vue';
import router from './router/index.js';

// Pages
Vue.component('default-page', require('./pages/DefaultPage.vue').default);

// Component
Vue.component('bottom-tab-bar-component', require('./components/default-page/BottomTabBarComponent.vue').default);
Vue.component('dropdown-default-component', require('./components/default-page/DropdownDefaultComponent.vue').default);
Vue.component('header-default-component', require('./components/default-page/HeaderDefaultComponent.vue').default);
Vue.component('hero-default-component', require('./components/default-page/HeroDefaultComponent.vue').default);
Vue.component('home-default-component', require('./components/default-page/HomeDefaultComponent.vue').default);
Vue.component('menu-default-component', require('./components/default-page/MenuDefaultComponent.vue').default);
Vue.component('sidebar-default-component', require('./components/default-page/SidebarDefaultComponent.vue').default);
Vue.component('population-and-top-article-component', require('./components/default-page/home-page-default/PopulationAndTopArticleComponent.vue').default);
Vue.component('latest-news-component', require('./components/default-page/home-page-default/LatestNewsComponent.vue').default);
const app = new Vue({
    el: '#app',
    router
});
