import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [{
        name: 'Home',
        path: '/',
        component: require('../pages/DefaultPage.vue').default,
    },
    {
        name: 'Login',
        path: '/login',
        component: require('../components/auth/LoginComponent.vue').default,
        beforeEnter(to, from, next) {
            let token = Vue.$cookies.get("sisteminformasipelayanandesajelutung_token");
            if (token == null) {
                next()
            } else if (token['role'][0] == 'operator') {
                next({
                    name: "OperatorHome"
                });
            } else if (token['role'][0] == 'resident') {
                next({
                    name: "ResidentHome"
                });
            }
        }
    },
    {
        name: 'OperatorHome',
        path: '/operator',
        component: require('../pages/OperatorPage.vue').default,
        children: [{
                name: 'CreateLetterTemplate',
                path: '/operator/letter-template/create',
                component: require('../components/operator-page/CreateLetterTemplateComponent.vue').default
            },
            {
                name: 'LetterRequestOperator',
                path: '/operator/letter-request',
                component: require('../components/operator-page/LetterRequestOperatorComponent.vue').default
            },
            {
                name: 'PageNotFoundOperator',
                path: "*",
                component: require('../components/404NotFoundComponent.vue').default
            }
        ],
        beforeEnter(to, from, next) {
            let token = Vue.$cookies.get("sisteminformasipelayanandesajelutung_token");
            if (token === null) {
                next({
                    name: "Login"
                });
            } else if (token['role'][0] == 'operator') {
                next();
            } else if (token['role'][0] == 'resident') {
                next({
                    name: "ResidentHome"
                });
            }
        }
    },
    {
        name: 'ResidentHome',
        path: '/resident',
        component: require('../pages/ResidentPage.vue').default,
        children: [{
                name: 'LetterService',
                path: '/resident/letter-service/',
                component: require('../components/resident-page/LetterServiceComponent.vue').default
            },
            {
                name: 'PageNotFoundResident',
                path: "*",
                component: require('../components/404NotFoundComponent.vue').default
            }
        ],
        beforeEnter(to, from, next) {
            let token = Vue.$cookies.get("sisteminformasipelayanandesajelutung_token");
            if (token === null) {
                next({
                    name: "Login"
                });
            } else if (token['role'][0] == 'resident') {
                next();
            } else if (token['role'][0] == 'operator') {
                next({
                    name: "OperatorHome"
                });
            }
        }
    },
]

const router = new VueRouter({
    linkActiveClass: 'active',
    mode: 'history',
    routes
})

export default router
