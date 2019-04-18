import Vue from 'vue'
import VueRouter from 'vue-router'

import store from './store/index'

import Login from './pages/Login'
import About from './pages/About'
import Works from './pages/Works'

Vue.use(VueRouter)

const routes = [
    {
        path: '/tjisl45iront',
        component: Login,
    },
    {
        path: '/works',
        component: Works,
        meta: {
            title: 'Works',
        },
    },
    {
        path: '/about',
        component: About,
        meta: {
            title: 'About',
        },
    },
]

const router = new VueRouter({
    mode: 'history',
    routes,
})

export default router

router.afterEach((to, from) => {
    if (to.meta && to.meta.title){
        store.dispatch('header/setHeaderText', to.meta.title)
    }
})