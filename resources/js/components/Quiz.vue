<template>
    <div v-if="!loading">
        <div class="quizContainer" v-if="this.questionCounter <= this.questions.length">
            <div class="question">
                <h1 v-if="this.questionCounter < (this.questions.length)" >{{ questions[questionCounter].text }}</h1>
                <h1 v-else class="question">Zaroz sie okaże czyś buger </h1>
            </div>
            <div v-if="this.questionCounter < (this.questions.length)" class="options">
                <div class="option" v-for="(answer, i) in questions[questionCounter].answers" :key="i" v-on:click="selectItem(i)" :class="{active: i === activeItem}">
                    <div class="circle"></div>
                    <h2 class="answer">{{ answer }}</h2>
                </div>
            </div>
            <div v-else class="options"></div>
            <div class="info">
                <progressBar :divider="this.questions.length" :questionCounter="questionCounter" @progressBarFullness="questionCounter++"></progressBar>
                <div class="progresstext">
                    <p v-if="this.questionCounter < (this.questions.length)"> Pytanie {{ questionCounter + 1 }} z {{ questions.length }}</p>
                </div>
                <button :class="{active: (this.activeItem || this.activeItem === 0)}" v-on:click="nextQuestion">Dalej</button>
            </div>
        </div>

        <div v-else class="quizContainer">
            <p v-for="(result, i) in results" :key="i">{{ result }}</p>
        </div>
    </div>
    <div v-else>Loading...</div>
</template>


<script>
import progressBar from './quiz/ProgressBar'

export default {
    data(){
        return {
            questions: [],
            questionCounter: 0,
            activeItem: null,
            results: [],
            loading: false
        }
    },

    components: {
        progressBar
    },

    beforeMount() {
        this.loading = true;
        axios.get('/api/questions').then(response => {
            this.questions = response.data;
        });
        this.loading = false;
    },

    methods: {
        nextQuestion() {
            let result = this.questions[this.questionCounter].answers[this.activeItem]
            this.results.push({
                id: this.questions[this.questionCounter].id,
                answer: result,
            });

            this.questionCounter++
            this.activeItem = null;
        },

        selectItem(i) {
            this.activeItem = i;
        }
    }
}
</script>
