import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'
import message from './message'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        auth,
        message
    }
})