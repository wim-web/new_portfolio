import Vue from 'vue'
import Vuex from 'vuex'

import header from './header'
import auth from './auth'
import createPersistedState from 'vuex-persistedstate';

Vue.use(Vuex)

const store = new Vuex.Store({
    modules: {
        header,
        auth,
    },
    plugins: [createPersistedState({
        key: 'PortfoliO',
        paths: ['auth.isLogin'],
        storage: window.sessionStorage
    })]
})

export default store