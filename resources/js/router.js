import Vue from 'vue'
import VueRouter from 'vue-router'

import store from './store/index'

import Top from './pages/Top'
import About from './pages/About'
import Works from './pages/Works'
import WorkDetail from './pages/WorkDetail'

import Login from './pages/Login'
import Edit from './pages/Edit'
import EditAbout from './pages/EditAbout'
import EditWorks from './pages/EditWorks'
import EditWorkDetail from './pages/EditWorkDetail'
import RegisterWork from './pages/RegisterWork'

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        component: Top,
        children: [
            {
                path: 'works',
                component: Works,
            },
            {
                path: 'about',
                component: About,
            },
            {
                path: 'works/:id',
                component: WorkDetail,
                props: true,
            }
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
                path: 'works/register',
                component:RegisterWork,
            },
            {
                path: 'works/:id',
                props: true,
                component: EditWorkDetail,
            },
            
        ]
    }
    
]


const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior () {
        return { x: 0, y: 0 }
    },
})

export default router
