<template>
    <div class="container">
        <div class="col-10 offset-1 text-center">
            <h1>Achtung! <br>Jesteś nieautoryzowanym buggerem!</h1>
            <h2>Musisz zdać egzamin zanim przejdziesz do strony. Podawaj swoje odpowiedzi poprawnie ponieważ tylko 100% skuteczności pozwoli Ci zalogować się na stronę.</h2>
            <h1><router-link class="quiz-btn" :to="{ name: 'quiz' }">Quiz</router-link></h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
}
</script>

<style scoped>
    h1 {
        margin-top: 70px;
    }
    h2 {
        font-size: 20px;
    }
    .container {
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
        display: inline-block;
        width: 250px;
        color: rgb(240, 61, 61, 1);
        font-weight: 500;
        padding: 7px 15px;
        background-color: white;
        border: none;
    }

    .quiz-btn:hover {
    box-shadow: 0px 0px 10px 0px rgba(255,255,255,1);
    text-decoration: none;
}
    
</style>
