<template>
    <div>
        <div v-if="!loading"> 
            <div v-if="validationConfirmed" class="result">
                <h1>Gratulacje test buggera zaliczony!</h1>
                <p>Musisz być dobrze zbugowany skoro udało Ci się na wszystkie pytania odpowiedzieć poprawnie.</p>
                <button>
                    <router-link class="welcome" :to="{ name: 'homepage' }">ZAPRASZAMY</router-link>
                </button>
            </div>
            
            <div v-else-if="!validationConfirmed">
               <h1>Wykurwiej!!!!!</h1>
            </div>
        </div>
        <div v-else>Loading</div>
    </div>
</template>


<script>
export default {
    data(){
        return {
            validationConfirmed: null,
            loading: false,
        }
    },
    props:["results"],

    created() {
        this.loading = true
        axios.post('/api/questions/check', this.results)
            .then(response => {
            this.validationConfirmed = response.data.success;
            this.loading = false})
    }
}
</script>

<style scoped>
    
    div {
        font-family: Nunito;
        text-align: center;
    }
    button {
    color: rgb(240, 61, 61, 1);
    font-weight: 500;
    padding: 7px 15px;
    width: 170px;
    background-color: white;
    border: none;
    transition: 0.3s
    }

    button:hover {
    box-shadow: 0px 0px 10px 0px rgba(255,255,255,1);

}

    .welcome {
    font-weight: 500;
    color: rgb(240, 61, 61, 1);
    text-decoration: none;
    }

    h1 {
        margin-top: 150px;
    }

</style>

<style>
    @import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
    
</style>