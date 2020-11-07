<template>
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
</template>


<script>
import progressBar from './quiz/ProgressBar'

export default {
    data(){
        return {
            questions: [
                {
                    id: 1,
                    text: "Kogo pierdolnął Tomasz Hajto na pasach i nie został za to ukarany?",
                    answers: ["najebanego szczepienia", "starom babe", "waldemara kaste", "mameda"]
                },
                {
                    id: 2,
                    text: "Ile nug ma padalec ?",
                    answers: ["3*6 czyli 18", "21", "35", "wszystkie"]
                },
                {
                    id: 3,
                    text: "co zajebał jan papież",
                    answers: ["szlugi", "liter wódki z barku", "kałczuka z odpustu", "coś inneg"]
                },
                {
                    id: 4,
                    text: "na co sasin przejebał 70 mln polski cebulionów ",
                    answers: ["na kurwy i koks", "wakacje w maroko", "wybory które się nie odbyły", "kebaba"]
                },
                {
                    id: 5,
                    text: 'Dokończ zdanie "Lech Roch Pawlak jest:"',
                    answers: ["oryginalnie blondynem", "cyganem", "rumunem", "potężnym pioskowym czarodziejem"]
                }
            ],

            questionCounter: 0,
            activeItem: null,
            results: []
        }
    },

    components: {
        progressBar
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
