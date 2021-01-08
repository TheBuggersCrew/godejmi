<template>
    <div class="container">
        <div class="wrapper">
            <h1>Achtung! <br>Jesteś nieautoryzowanym buggerem!</h1>
            <h2>Musisz zdać egzamin zanim przejdziesz do strony. Podawaj swoje odpowiedzi poprawnie ponieważ tylko 100% skuteczności pozwoli Ci zalogować się na&nbsp;stronę.</h2>
            <h1><router-link class="quiz-btn" :to="{ name: 'quiz' }" 
            @changeAnimationHomePage="changeAnimationHomePage">Quiz</router-link></h1>
        </div>
    </div>
</template>

<script>

export default {
    name: "EnterWindow",
    methods: {
        changeAnimationHomePage() {
            this.$emit("changeAnimationHomePage")
        }
    }
}


</script>


<style scoped>
    * {
        font-weight: 500;
    }
    h1 {
        font-size: 38px;
        margin-top: 40px;
        text-align: center;
    }
    h2 {
        margin-top: 10px;
        font-size: 20px;
        text-align: center;
    }
    .container {
        margin-top: 200px;
        font-family: "Nunito";
        display: flex;
        flex-direction: column;
        margin: 0 auto;
        margin-top: 50px;
        color: white;
        border-radius: 20px;
    }

    .quiz-btn {
        margin: 0 auto;
        text-decoration: none;
        text-align: center;
        transition: 0.2s;
        display: block;
        width: 250px;
        color: white;
        font-weight: 500;
        padding: 7px 15px;
        background-color: rgb(255, 0, 0, 0.67);
        border: none;
        margin-bottom: 40px;
    }

    .quiz-btn:hover {
        box-shadow: 0px 0px 10px 0px rgba(255, 0, 0, 0.67);
        text-decoration: none;
    }
    .wrapper {
        box-shadow: 0px 0px 7px -1px rgba(0,0,0,1);
        width: 600px;
        padding: 10px 20px;
        color: rgb(255, 0, 0, 0.67);
        background-color: rgba(255, 255, 255, 0.65);
        margin:75px auto;
        transition: 0.2s;
    }

    .wrapper:hover {
        background-color: rgba(255, 255, 255, 1);
    }

    @media (orientation: portrait) {
        div.container {
            margin-top: 80px;
        }
    }

    @media (max-width: 768px) {
        .wrapper {
            width: 450px;
        }
        h1 {
        font-size: 32px;
        margin-top: 30px;
    }
        h2 {
        font-size: 18px;
    }}
    @media (orientation:portrait) and (max-width:520px) {
        div.container {
            margin-top: 50px;
        }
        .wrapper {
            width: 390px;
        }
        h1 {
        font-size: 30px;
    }
        h2 {
        font-size: 17px;
    }}
    @media (orientation:portrait) and (max-width:420px) {
         div.container {
            margin-top: 40px;
        }
        .wrapper {
            width: 350px;
        }
        h1 {
        font-size: 26px;
    }
        h2 {
        font-size: 16px;
    }}
    @media (orientation:portrait) and (max-width:380px) {
        div.container {
            margin-top: 20px;
        }
        .wrapper {
            width: 300px;
        }
        h1 {
        font-size: 22px;
    }
        h2 {
        font-size: 16px;
    }}
</style>
