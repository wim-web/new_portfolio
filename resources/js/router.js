import Vue from 'vue'
import VueRouter from 'vue-router'

import store from './store/index'

/* web */
import Top from './pages/web/Top'
import About from './pages/web/About'
import Works from './pages/web/Works'
import WorkDetail from './pages/web/WorkDetail'
import Login from './pages/web/Login'

/* edit */
import Edit from './pages/edit/Top'
import EditAbout from './pages/edit/About'
import EditWorks from './pages/edit/Works'
import EditWorkDetail from './pages/edit/WorkDetail'
import RegisterWork from './pages/edit/RegisterWork'

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
