<template>
    <div class="wrapper">
        <section class="displayer">
            <div v-for="data in shoutBoxContent" :key="data.nickname" class="message">
                <h3>{{ data.created_at }} {{ data.nickname }}:</h3>
                <h3>{{ data.message }}</h3>

            </div>
        </section>
        <input v-model="message" class="input-message">
        <button @click="send">></button>
    </div>
</template>

<script>
export default {
    data(){
        return {
            message: "",
            shoutBoxContent: []
        }
    },

    created() {
        setInterval(this.downloadMessages, 1000)
    },

    methods: {
        sendMessage() {
            axios.post("/api/shoutbox/send", {
                content: this.message
            })
        },

        downloadMessages() {
            axios.get("/api/shoutbox/messages")
            .then(res => {
                this.shoutBoxContent = res.data
            })
        
        }
    }
}
</script>

<style scoped>
    .wrapper {
        width: 100%;
        height: 100%;
        position: relative;
    }
    .displayer {
        width: 100%;
        height: 80%;
        border: 1px solid black;
        overflow-y: scroll;
    }
    .input-message {
        width: 100%;
        height: 20%;
    }

    button {
        position: absolute;
        top: 90%;
        left: 95%;
        transform: translate(0%, -50%);
        border: 1px solide red;
        border-radius: 50%;
        font-size: 50px;
        font-weight: 800;        
    }

    .message {
        text-align: right;
        padding: 10px;
        background-color: #dedede;
        margin: 10px;
    }
</style>