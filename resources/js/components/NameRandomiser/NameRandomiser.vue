<template>
    <div class="container">
        <div class="logo">
            <img src="/img/godejmi-logo.png" alt="">
        </div>
        <div class="app">
            <h1 class="headline">a dziś <span>godej mi</span></h1>
            <div class="displayer-wrapper">
                <h1 class="displayer">{{ nickname }}</h1>
            </div>
            <button v-if="rerollLimit" v-on:click="getNickname" class="draw"></button>
            <button v-else class="enough"></button>
        </div>
        <a class="button" @click="$router.go(-1)">back</a>
    </div>
</template>

<script>

import baffle from 'baffle';

export default {
    data(){
        return {
            nickname: "",
            rerollLimit: true,
        }
    },

    created() {
        this.$store.commit("changeLeaveAnimation", "animate__animated animate__backOutLeft"),
        this.$store.commit("changeEnterAnimation", "animate__animated animate__backInRight")
    },

    methods: {
        getNickname() {
            
            axios.get('/api/draw')
                .then(res => {
                    this.nickname = res.data.nickname;

                    let b = baffle('.displayer');
                    b.start().set({ speed: 60 })
                    .text(text => this.nickname)
                    .reveal(10000);
                })
                .catch(res => {
                    this.rerollLimit = false;
                });
                
    }},
    
}

</script>

<style scoped>
    .container {
        width: 100%;
        height: 100%; 
        position: relative;
    }

    div.displayer-wrapper {
        position: relative;
        animation: pulse 1.5s infinite;
        border: 1px solid rgba(240,61,61,1);
        width: 700px;
        height: 100px;
        margin: 50px auto;
        text-align: center;
        border-radius: 15px;
    }

    button {
        margin: 30px;
        width: 200px;
        height: 70px;
        background-color: transparent;
        border: none;
        display: block;
        margin: 0 auto;
        opacity: 0.8;
        transition: 0.2s;
        outline: none;
        background-size: cover;
    }

    button.draw:hover {
        transform: scale(1.1);
        opacity: 1.2;
    }

    .draw {
        background-image: url("/img/but1.png");
    }

    .enough {
        background-image: url("/img/but3.png");
    }

    div.logo {
        margin: 0 auto;
        width: 282px;
        text-align: center;
    }

    div.logo img {
        margin-top: 90px;
        width: 100%;
        height: auto;
    }

    h1.headline {
        text-align: center;
        text-transform: uppercase;
        font-style: italic;
        color: #444444;
        font-size: 45px;
    }

    h1.headline span {
        font-size: 60px;
        color: #f03d3d
    }

    h1.displayer {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        font-size: 70px;
        color: #f03d3d;
        text-transform: uppercase;
    }

    footer {
        position: absolute;
        left: 0;
        bottom: 0;
        color: #f03d3d;
        width: 100%;
        height: 40px;
        border-top: 1px solid #f03d3d;
        text-align: center;
        font-size: 14px;
    }

    footer p {
        margin-top: 10px;
    }

    .button {
        cursor: pointer;
        text-align: center;
        position:absolute;
        right: 10%;
        top: 5%;
        width: 150px;
        background: linear-gradient(to right bottom, rgba(255,0,30,0.7) 0%, rgba(255,0,0,0.67) 34%, rgba(255,90,255,0.8) 100%);
        border-radius: 50px;
        border: none;
        padding: 10px 20px;
        color: white;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 700;
        transition: 0.2s;
        text-decoration:none;
    }

    .button:hover { 
        box-shadow: 0px 0px 10px 0px rgba(255, 0, 0, 0.67);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0px 0px 0px 0px rgba(240,61,61,1);
        }
        50% {
            box-shadow: 0px 0px 10px 0px rgba(240,61,61,1);
        }
        100% {
            box-shadow: 0px 0px 0px 0px rgba(240,61,61,1);
        }
    }

    @media (orientation: portrait) {
        div.displayer-wrapper {
            width: 90%;
        }
    }

    @media (max-width: 600px) {
        div.displayer-wrapper {
            height: 75px;
            margin-top: 80px;
        }
        
        h1.displayer {
            font-size: 55px;
            text-transform: uppercase;
        }
    }

    @media (max-width: 500px) {
        div.logo {
            margin: 0 auto;
            width: 250px;
        }
        h1.headline {
            margin-top: 30px;
            font-size: 32px;
        }
        h1.headline span {
            font-size: 45px;
        }
        div.displayer-wrapper {
            height: 60px;
        }
        h1.displayer {
            font-size: 40px;
            text-transform: uppercase;
        }
    }

    @media (max-width: 400px) {
        div.logo {
            margin: 0 auto;
            width: 230px;
        }
        h1.headline {
            margin-top: 20px;
            font-size: 28px;
        }
        h1.headline span {
            font-size: 40px;
        }
        div.displayer-wrapper {
            height: 50px;
            margin: 70px auto 40px auto;
        }
        h1.displayer {
            font-size: 35px;
        }
    }

    @media (max-width: 330px) {
        div.logo {
            width: 200px;
        }
        h1.headline {
            margin-top: 10px;
            font-size: 24px;
        }
        h1.headline span {
            font-size: 35px;
        }
        div.displayer-wrapper {
            height: 40px;
            margin: 50px auto 30px auto;
        }
        h1.displayer {
            font-size: 30px;
            text-transform: uppercase;
        }
    }
</style>