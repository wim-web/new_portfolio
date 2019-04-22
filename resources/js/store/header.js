const state = {
    headerText: 'Enter about OR works',
    isSmall: false,
    headerPlaceHolder: 'Enter about OR works',
}

const getters = {

}

const mutations = {
    setHeaderText (state, headerText) {
        state.headerText = headerText
    },
    setIsSmall (state, bool) {
        state.isSmall = bool
    },
    setHeaderPlaceHolder (state, text) {
        state.headerPlaceHolder = text
    }
}

const actions = {
    setHeaderText ({ commit }, headerText) {
        commit('setHeaderText', headerText)
    },
    setIsSmall ({ commit }, bool) {
        commit('setIsSmall', bool)
    },
    setHeaderPlaceHolder ({ commit }, text) {
        commit('setHeaderPlaceHolder', text)
    },
    resetState ({ commit }) {
        commit('setHeaderText', 'Enter about OR works')
        commit('setIsSmall', false)
        commit('setHeaderPlaceHolder', 'Enter about OR works')
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
