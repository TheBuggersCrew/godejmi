<template>
    <div>
        <div v-if="!loading" class="wrapper"> 
            <div v-if="validationConfirmed" class="result">
                <h1>Gratulacje test buggera zaliczony!</h1>
                <p>Podaj swoje imię:</p>
                <input v-model="nickname" type="text">
                <button @click="sendNickname" :class="{disabled: !nicknameProvided}">
                    <div class="button-disabled" v-if="!nicknameProvided">ZAPRASZAMY</div>
                    <router-link v-else class="welcome" :to="{ name: 'homepage' }">ZAPRASZAMY</router-link>
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
            if(this.nicknameProvided) {
            axios.post('/api/shoutbox/setNickname', {
                nickname: this.nickname
            })}
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
        width: 80%;
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

    .disabled {
        color: white;
        background-color: #666;
    }
    .disabled:hover {
        box-shadow: 0px 0px 0px 0px rgba(255,255,255,0)
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
        font-size: 22px;
        padding: 20px;
    }

    input {
        width: 170px;
        font-size: 22px;
        margin: 20px 0px;
    }
    
    @media (max-width: 1024px) {
        .wrapper {
            min-height: 400px;
        }
    } 
    @media (max-width: 776px) {
        h1 {
            font-size: 28px;
        }
        p {
            font-size: 20px;
        }
    }
    @media (max-width: 620px) {
        h1 {
            font-size: 26px;
        }
        
    }  
    @media (max-width: 435px) {
        h1 {
            font-size: 24px;
        }
        p {
            font-size: 18px;
        }
    }  
    @media (max-width: 390px) {
        h1 {
            font-size: 22px;
        }

    }
    @media (max-width: 350px) {
        h1 {
            
            font-size: 20px;
        }
        p {
            font-size: 16px;
        }
    }


</style>

