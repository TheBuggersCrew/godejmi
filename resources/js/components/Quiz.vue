<template>
    <div v-if="!loading">
        <div class="quizContainer" v-if="questionCounter <= questions.length">
            <div class="question">
                <h1 v-if="questionCounter < questions.length">{{ questions[questionCounter].text }}</h1>
            </div>
            <div v-if="questionCounter < (questions.length)" class="options">
                <div class="option" v-for="(answer, i) in questions[questionCounter].answers" :key="i" v-on:click="selectItem(i)" :class="{active: i === activeItem}">
                    <div class="circle"></div>
                    <h2 class="answer">{{ answer }}</h2>
                </div>
            </div>
            <div v-else class="options"></div>
            <div class="info">
                <progressBar :nextQuestion="nextQuestion" :divider="questions.length" :questionCounter="questionCounter"></progressBar>
                <div class="progresstext">
                    <p v-if="questionCounter < (questions.length)"> Pytanie {{ questionCounter + 1 }} z {{ questions.length }}</p>
                </div>
                <button :class="{active: (activeItem || activeItem === 0)}" v-on:click="nextQuestion">Dalej</button>
            </div>
        </div>

        <result v-else class="quizContainer">
            <p v-for="(result, i) in results" :key="i">{{ result }}</p>
        </result>
    </div>
    <div v-else>Loading...</div>
</template>


<script>
import progressBar from './quiz/ProgressBar'
import result from './quiz/Result'

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
        progressBar,
        result
    },

    beforeCreate() {
        this.loading = true;
        axios.get('/api/questions').then(response => {
            this.questions = response.data;
        });
        this.loading = false;
    },

    methods: {
        nextQuestion() {
            if(this.questionCounter === this.questions.length) {

                return this.questionCounter++
            }
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

<style scoped>

* {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: "Nunito";
}

body {
    background-image: url("/img/background.png");
}

.quizContainer {
    font-family: "Roboto";
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    margin-top: 50px;
    background-color: rgb(255, 0, 0, 0.67);
    width: 800px;
    height: 450px;
    color: white;
    border-radius: 20px;
}

div.question {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 20%;
    width: 85%;
    margin: 0 auto;
    margin-top: 20px;
}

div.question h1 {
    line-height: 30px;
    font-size: 24px;
}

div.options {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-content: center;
    width: 100%;
    height: 60%;
}

div.option {
    display: flex;
    align-items: center;
    margin: 0 auto;
    border: 1px white solid;
    height: 55px;
    width: 70%;
    transition: 0.2s;
}

div.option:hover {
    box-shadow: 0px 0px 10px 0px rgba(255,255,255,1);

}

div.option.active div.circle {
    background-image: url("/img/ico.png");
    background-position: center;
    background-size: contain;
}

div.circle {
    margin-left: 15px;
    width: 25px;
    height: 25px;
    border: 1px solid white;
    border-radius: 50%;
}
h2.answer {
    font-size: 16px;
    margin-left: 10px;
    line-height: 21px;
}

div.info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 70%;
    margin: 0 auto;
    margin-top: 10px;
}

.progresstext {
    font-size: 14px;
    margin-right: 35px;
}
button {
    color: rgb(240, 61, 61, 1);
    font-weight: 500;
    padding: 7px 15px;
    width: 120px;
    background-color: white;
    border: none;
    transform: scale(0);
}

button.active {
    animation: showBtn 0.4s;
    transform: scale(1);
    transition: 0.2s;
}
button.active:hover {
    box-shadow: 0px 0px 10px 0px rgba(255,255,255,1);
}
div.option.active {
    box-shadow: 0px 0px 10px 0px rgba(255,255,255,1);
}

.result {
    margin: 0 auto;
    margin-top: 100px;
    width: 500px;
    color: white;
    font-size: 30px;
    border: 1px solid white;
}

</style>