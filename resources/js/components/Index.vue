<template>
    <div class="row">
        <div class="col-8 offset-2 text-center">
            <h1>Achtung! Jesteś nieautoryzowanym buggerem!</h1>
            <h2>Musisz zdać egzamin zanim przejdziesz do strony.</h2>
            <h1><router-link class="btn btn-primary btn-lg w-50 mt-5" :to="{ name: 'quiz' }">Quiz</router-link></h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
}
</script>

<style scoped>

</style>
