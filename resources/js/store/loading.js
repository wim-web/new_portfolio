const state = {
    loading: true,
}

const mutations = {
    setLoading (state, load) {
        state.loading = load
    } 
}

export default {
    namespaced: true,
    state,
    mutations,
}