const state = {
    category: 'all',
}

const mutations = {
    setCate (state, cate) {
        state.category = cate
    },
    resetCate (state) {
        state.category = 'all'
    }
}

export default {
    namespaced: true,
    state,
    mutations,
}