import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

const routes = [{
        name: 'Home',
        path: '/',
        component: require('../pages/DefaultPage.vue').default
    },
    {
        name: 'Login',
        path: '/login',
        component: require('../components/auth/LoginComponent.vue').default,
    },
    {
        name: 'OperatorHome',
        path: '/operator',
        component: require('../pages/OperatorPage.vue').default,
        children: [{
            name: 'CreateLetterTemplate',
            path: '/operator/letter-template/create',
            component: require('../components/operator-page/CreateLetterTemplateComponent.vue').default
        }, ]
    },
    {
        name: 'ResidentHome',
        path: '/resident',
        component: require('../pages/ResidentPage.vue').default,
        children: [{
            name: 'LetterService',
            path: '/resident/letter-service/',
            component: require('../components/resident-page/LetterServiceComponent.vue').default
        }, ]
    },
]

const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
})

export default router
