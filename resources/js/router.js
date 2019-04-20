import Vue from 'vue'
import VueRouter from 'vue-router'

import store from './store/index'

import Top from './pages/Top'
import About from './pages/About'
import Works from './pages/Works'

import Login from './pages/Login'
import Edit from './pages/Edit'
import EditAbout from './pages/EditAbout'
import EditWorks from './pages/EditWorks'
import EditWorkDetail from './pages/EditWorkDetail'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: Top,
        children: [
            {
                path: 'works',
                component: Works,
                meta: {
                    title: 'Works',
                },
            },
            {
                path: 'about',
                component: About,
                meta: {
                    title: 'About',
                },
            },
        ]
    },
    {
        path: '/login',
        component: Login,
        beforeEnter: (to, from, next) => {
            if (store.state.auth.isLogin) {
                next('/edit')
            } else {
                next()
            }
        }
    },
    {
        path: '/edit',
        component: Edit,
        beforeEnter: (to, from, next) => {
            if (store.state.auth.isLogin) {
                next()
            } else {
                next('/')
            }
        },
        children: [
            {
                path: 'about',
                component: EditAbout,
            },
            {
                path: 'works',
                component: EditWorks,
            },
            {
                path: 'work/detail',
                component: EditWorkDetail,
            }
        ]
    }
    
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