<template>
    <div class="wrapper">
        <header>Shoutbox</header>
        <section @mousedown="clearInterval" @mouseup="interval" class="displayer">
            <div v-for="(data, i) in shoutBoxContent" :key="i" class="message">
                <h3 class="nickname">{{ data.nickname }}:</h3>
                <br>
                <h3 class="content">{{ data.content }}</h3>
            </div>
        </section>
        <textarea placeholder="Type here" v-on:keyup.enter="sendMessage" v-model="message" class="input-message"></textarea>
        <button @click="sendMessage"><img class="ico" src="/img/letter.png"></button>
    </div>
</template>

<script>

export default {
    data(){
        return {
            message: "",
            shoutBoxContent: {},
            intervalId: null,
        }
    },

    created() {
        this.interval()
    },

    computed: {
        displayer() {
            return document.querySelector(".displayer")
        },
    },

    methods: {
        sendMessage() {
            if(this.message !== "") {
                axios.post("/api/shoutbox/send", {
                    content: this.message
                })

                this.message = ""
            }
        },

        downloadMessages() {
            axios.get("/api/shoutbox/messages")

            .then(res => {
                this.shoutBoxContent = res.data})

            .then(res => {
                this.displayer.scrollTop = this.displayer.scrollHeight; 
            })
        },

        clearInterval() {
            window.clearInterval(this.intervalId)
        },

        interval() {
             this.intervalId = setInterval(this.downloadMessages, 1500);
         },
    }
}
</script>

<style scoped>

    .wrapper {
        width: 100%;
        height: 100%;
        position: relative;
    }
    header {
        font-size: 20px;
        padding: 15px 25px;
        text-align: right;
        color: white;
        font-weight: 800;
        width: 100%;
        height: 10%;
        background: linear-gradient(to right bottom, rgba(255,0,30,0.7) 0%, rgba(255,0,0,0.67) 34%, rgba(255,90,255,0.8) 100%);
    }
    .displayer {
        background: linear-gradient(to right bottom, rgba(255,255,255,0.9), rgba(0,0,0,0.1));
        width: 100%;
        height: 75%;
        overflow-y: scroll;
    }
    .input-message {
        padding: 10px 20px;
        color: white;
        border: 0;
        resize: none;
        width: 100%;
        height: 15%;
        background: linear-gradient(to right bottom, rgba(255,0,30,0.7) 0%, rgba(255,0,0,0.67) 34%, rgba(255,90,255,0.8) 100%);
    }

    button {
        cursor: pointer;
        border: none;
        background: none;
        position: absolute;
        bottom: 1%;
        left: 86%;
        height: 75px;
        width: 75px;
        transition: 0.2s;
        border-radius: 50%;
    }

    button:hover {
        transform:scale(1.07);
        box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.67);
    }

    img {
        width: 100%;
        height: 100%;
    }

    .message {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        color: #444444;
        text-align: right;
    }

    .nickname {
        min-width: 180px;
        background: linear-gradient(to right bottom, rgba(255,0,30,0.7) 0%, rgba(255,0,0,0.67) 34%, rgba(255,90,255,0.8) 100%);
        border-radius: 10px 10px 0px 0px;
        display: inline-block;
        color: white;
        padding: 10px 20px;
        margin: 0 auto;
    }

    .content {
        background: white;
        border-radius: 10px 0px 10px 10px;
        display: inline-block;
        padding: 15px 20px;
        min-width: 200px;
        font-weight: 400;
    }



 
</style>