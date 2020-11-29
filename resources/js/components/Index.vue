<template>
    <div class="container">
        <div class="wrapper">
            <h1>Achtung! <br>Jesteś nieautoryzowanym buggerem!</h1>
            <h2>Musisz zdać egzamin zanim przejdziesz do strony. Podawaj swoje odpowiedzi poprawnie ponieważ tylko 100% skuteczności pozwoli Ci zalogować się na stronę.</h2>
            <h1><router-link class="quiz-btn" :to="{ name: 'quiz' }">Quiz</router-link></h1>
        </div>
        <router-view/>
        
    </div>
</template>

<script>


export default {
    name: "Index",
}
</script>


<style scoped>

    h1 {
        margin-top: 40px;
        text-align: center;
    }
    h2 {
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
        background-color: rgb(255, 0, 0, 0.67);
        width: 800px;
        height: 450px;
        color: white;
        border-radius: 20px;
    }

    .quiz-btn {
        margin: 0 auto;
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
        background-color: #ffffff;
        margin:75px auto;
    }

    @media (orientation: portrait) {
        div.container {
            margin-top: 150px;
        }
    }
    
    @keyframes fadeInDown {
    from {
        opacity: 0;
        transform: translate3d(0, -100%, 0);
    }

    to {
        opacity: 1;
        transform: translate3d(0, 0, 0);
    }
    }

    .fadeInDown {
    animation-name: fadeInDown;
    }

    .quiz-enter-active {
        animation: fadeInDown 1s,
    }
    .quiz-leave-active {
        animation: fadeInDown 1s reverse,
    }
</style>
