export default {
    namespaced: true,
    state: {
        content: ''
    },
    mutations: {
        setContent(state, value) {
            state.content = value
            setTimeout(() => (state.content = ''), 4000)
        }
    }
}