import { OK } from '../util'

export default {
    namespaced: true,
    state: {
        user: null
    },
    getters: {
        check: state => !!state.user,
        username: state => state.user ? state.user.name : '',
        email: state => state.user ? state.user.email : '',
        userimage: state => state.user ? state.user.url : ''
    },
    mutations: {
        setUser(state, user) {
            state.user = user
        }
    },
    actions: {
        async currentUser(context) {
            const response = await axios.get('/api/user')
            if (response.status === OK) {
                const user = response.data || null
                context.commit('setUser', user)
            }
        }
    }
    
}