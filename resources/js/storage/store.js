import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export default new Vuex.Store({

    state: {
        enterAnimation: "animate__animated animate__backInRight",
        leaveAnimation: "animate__animated animate__backOutDown",

        questionCounter: 0,
        questions: [],
    },

    mutations: {
        incrementQuestionCounter(state) {
            state.questionCounter++
        },

        downloadQuestions(state, payload) {
            state.questions = payload;
        },

        changeEnterAnimation(state, animation) {
            state.enterAnimation = animation
        },

        changeLeaveAnimation(state, animation) {
            state.leaveAnimation = animation
        },
    },

    actions: {
        downloadQuestions(context) {
            axios.get('/api/questions').then(response => {
                let payload = response.data;
                context.commit("downloadQuestions", payload)
            })
        }
    },
})