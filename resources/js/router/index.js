import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [{
    name: 'Home',
    path: '/',
    component: require('../pages/DefaultPage.vue').default
}, {
    name: 'OperatorHome',
    path: '/operator',
    component: require('../pages/OperatorPage.vue').default
}, ]


const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
})

export default router
