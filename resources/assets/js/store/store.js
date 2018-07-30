import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        isLoggedIn: !!localStorage.getItem('token'),
        user: localStorage.getItem('user'),

        nav: {
            type: 'not wide by default'
        }
    },
    mutations: {
        loginUser (state) {
            state.isLoggedIn = true;
            state.user = localStorage.getItem('user');
        },
        logoutUser (state) {
            state.isLoggedIn = false;
            state.user = '';
        },
    }
})