const state = {
    isLogin: false
}

const mutations = {
    login (state) {
        state.isLogin = true
    },
    logout (state) {
        state.isLogin = false
    },
    setIsLogin (state, loginData) {
        state.isLogin = loginData
    }
}

export default {
    namespaced: true,
    state,
    mutations,
}