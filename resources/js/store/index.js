import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import cate from './category'
import loading from './loading'
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        auth,
        cate,
        loading,
    },
    plugins: [createPersistedState({
        key: 'PortfoliO',
        paths: ['auth.isLogin'],
        storage: window.sessionStorage
    })]
})

export default store