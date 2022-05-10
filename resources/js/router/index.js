import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = []


const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
})

export default router
