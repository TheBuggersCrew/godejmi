<template>
    <div v-if="!loading" class="page">
        <div class="quizContainer" v-if="questionCounter <= questions.length">
            <div class="question">
                <h1 v-if="questionCounter < questions.length">{{ questions[questionCounter].text }}</h1>
            </div>
            <div v-if="questionCounter < questions.length" class="options">
                <div class="option" v-for="(answer, i) in questions[questionCounter].answers" :key="i" v-on:click="selectItem(i)" :class="{active: i === activeItem}">
                    <div class="circle"></div>
                    <h2 class="answer">{{ answer }}</h2>
                </div>
            </div>
            <div class="info">
                <progressBar :nextQuestion="nextQuestion" :divider="questions.length" :questionCounter="questionCounter"></progressBar>
                <div class="progresstext">
                    <p v-if="questionCounter < questions.length"> Pytanie {{ questionCounter + 1 }} z {{ questions.length }}</p>
                </div>
                <div class="button-wrapper">
                    <transition name="bounce">
                        <button v-if="showButton" v-on:click="nextQuestion">Dalej</button>
                    </transition>
                </div>
                
            </div>
        </div>

        <result v-else :results="results" class="quizContainer"></result>
        
    </div>
</template>


<script>
import progressBar from './ProgressBar'
import result from './Result'

export default {
    data(){
        return {
            questions: [],
            results: [],
            questionCounter: 0,
            showButton: false,
            activeItem: null,
            loading: false,
        }
    },

    props: ["leaveAnimation", "enterAnimation"],

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

    mounted() {
        this.$emit("changeAnimationHomePage")
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
            this.showButton = false;
    },

        selectItem(i) {
            this.activeItem = i;
            this.showButton = true;
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
    font-weight: 500;
}

.quizContainer {
    position: relative;
    font-family: "Roboto";
    display: flex;
    flex-direction: column;
    margin: 0 auto;
    background-color: rgb(255, 0, 0, 0.67);
    width: 800px;
    color: white;
    border-radius: 20px;
    min-height: 450px;
}

div.question {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 25%;
    width: 85%;
    margin: 0 auto;
    padding: 30px 0px 20px;
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
    min-height: 60%;
}

div.option {
    cursor: pointer;
    display: flex;
    align-items: center;
    margin: 3px auto;
    padding: 10px 0px;
    border: 1px white solid;
    height: 55px;
    width: 75%;
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
    width: 75%;
    margin: 10px auto;
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
}
.button-wrapper {
    color: rgb(240, 61, 61, 1);
    width: 120px;
    height: 40px;
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

.bounce-enter-active{
    animation: bounceIn 0.4s  ease
}

.bounce-leave-active {  
    animation: bounceIn 0.4s ease reverse;

}

@keyframes bounceIn { 
    0% {
        transform: scale(0.1);
        opacity: 0;
    }
    60% {
        transform: scale(1.3);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
@media (max-width: 1024px) {
    .quizContainer {
        width: 700px;
        min-height: 400px;
    }
    div.question h1 {
        line-height: 26px;
        font-size: 22px;
    }
    div.option {
        width: 80%;
    }
    div.info {
        width: 80%;
    }
} 
@media (max-width: 776px) {
    .quizContainer {
        width: 600px;
    }
    div.question {
        width: 90%;
    }
    div.question h1 {
        line-height: 26px;
        font-size: 22px;
    }
    div.option {
        width: 85%;
        height: 45px;
    }
    div.info {
        width: 85%;
    }
    div.progressBar {
        width: 160px;
    }
}
@media (max-width: 620px) {
    .quizContainer {
        width: 400px;
    }
    div.question {
        width: 85%;
    }
    div.question h1 {
        line-height: 24px;
        font-size: 20px;
    }
    div.option {
        margin: 6px auto;
    }
    div.info {
        width: 85%;
        flex-direction: column;
    }
    div.progressBar {
        width: 100%;
        margin-top: 10px;
    }
    .progresstext {
        margin:12px;
        
    }
    .button-wrapper { 
        height: 50px;
    }
}  
@media (max-width: 420px) {
    .quizContainer {
        width: 360px;
    }
    div.question h1 {
        line-height: 20px;
        font-size: 18px;
    }
    h2.answer {
        font-size: 14px;
    }
    div.circle {
        width: 20px;
        height: 20px;
    }
}  
@media (max-width: 390px) {
    .quizContainer {
        width: 320px;
    }
    div.question h1 {
        line-height: 20px;
        font-size: 16px;
    }
    h2.answer {
        font-size: 14px;
    } 
}
@media (max-width: 350px) {
    .quizContainer {
        width: 290px;
    }
    div.question h1 {
        line-height: 20px;
        font-size: 15px;
    }
    h2.answer {
        font-size: 13px;
    }
    .progresstext {
        font-size: 13px;
    }
    button {
        font-size: 13px;
    }
}   
</style>