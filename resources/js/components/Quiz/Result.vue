<template>
    <div>
        <div v-if="!loading" class="wrapper"> 
            <div v-if="validationConfirmed" class="result">
                <h1>Gratulacje test buggera zaliczony!</h1>
                <p>Podaj swoje imię:</p>
                <input v-model="nickname" type="text">
                <button @click="sendNickname" v-if="nicknameProvided">
                    <router-link class="welcome" :to="{ name: 'homepage' }">ZAPRASZAMY</router-link>
                </button>
            </div>
            
            <div v-else-if="!validationConfirmed">
               <h1>Wypad!!!!!</h1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            nickname: "",
            nicknameProvided: false,
            validationConfirmed: null,
            loading: false,
        }
    },
    
    props:["results"],

    watch: {
        nickname() {
            if(this.nickname.length > 3){
                this.nicknameProvided = true
            }
            else {
                this.nicknameProvided = false
            }
        }
    },

    methods: {
        sendNickname() {
            axios.post('/api/shoutbox/setNickname', {
                nickname: this.nickname
            })
        }
    },

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
    .wrapper {
        width: 100%;
        min-height: 450px;
        position: relative;
    }
    .result {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%)
    }
    div {
        font-family: Nunito;
        text-align: center;
    }
    button {
        margin: 0 auto;
        display: block;
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
        padding: 20px;
    }
    p {
        padding: 20px;
    }
    
    @media (max-width: 1024px) {
        .wrapper {
            min-height: 400px;
    }}

</style>

