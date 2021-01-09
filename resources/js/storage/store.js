import Vuex from 'vuex'
import Vue from 'vue'

Vue.use(Vuex)

export default new Vuex.Store({

    state: {
        questionCounter: 0,
        questions: [],
        enterAnimation: "animate__animated animate__backInRight",
        leaveAnimation: "animate__animated animate__backOutDown",
    },

    mutations: {
        incrementQuestionCounter(state) {
            state.questionCounter++
        },

        downloadQuestions(state) {
            axios.get('/api/questions').then(response => {
                state.questions = response.data;
            });
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
            context.commit("downloadQuestions")
            },
        }
    },
)