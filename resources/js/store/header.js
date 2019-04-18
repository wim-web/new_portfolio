const state = {
    headerText: 'Enter about OR works',
}

const getters = {

}

const mutations = {
    setHeaderText (state, headerText) {
        state.headerText = headerText
    }
}

const actions = {
    setHeaderText ({ commit }, headerText) {
        commit('setHeaderText', headerText)
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
