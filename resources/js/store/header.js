const state = {
    isSmall: false,
    isWork: true,
    isAbout: true,
}

const getters = {

}

const mutations = {
    setIsSmall (state, bool) {
        state.isSmall = bool
    },
    isWork (state) {
        state.isWork = true
        state.isAbout = false
    },
    isAbout (state) {
        state.isWork = false
        state.isAbout = true
    },
    resetState (state) {
        state.isSmall = false
        state.isAbout = true
        state.isWork = true
    }
}

const actions = {
    resetState ({ commit }) {
        commit('resetState')
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
