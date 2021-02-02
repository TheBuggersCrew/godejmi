<template>
    <div>
        <nav>
            <div class="headlineWrap">
                <h1>GODEJ<span>MI</span>.PL</h1>
                <div class="imgWrapper">
                    <img src="/img/godejmi-logo.png" alt="">
                </div>
            </div>
        </nav>
        <section>
            <div class="element">
                <header>godejmi.pl</header>
                <div class="imgPreview">
                    <img src="/img/godejmiPreview.png" alt="">
                </div>
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. A erat nam at.</p>
                <button><router-link class="button" :to="{name: 'name-randomiser'}">Przejdź</router-link></button>
            </div>
            <div class="shoutbox-wrapper">
                <Shoutbox />
            </div>  
        </section>
    </div>
</template>

<script>

import Shoutbox from "../Shoutbox/Shoutbox"

export default {
    components: {
        Shoutbox
    },

    created() {
        this.$store.commit("changeLeaveAnimation", "animate__animated animate__backOutRight"),
        this.$store.commit("changeEnterAnimation", "animate__animated animate__backInLeft")
    }
}

</script>

<style scoped>
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
    nav {
        display: flex;
        flex-direction: row;
        max-width: 1400px;
        margin: 0px auto 50px;
        justify-content: space-between;
        align-items: center;
    }
    .headlineWrap {
        display: flex;
        align-items: center;
    }
    h1 {
        font-size: 70px;
        letter-spacing: 15px;
        margin: 0;
        color: rgb(255, 0, 0, 0.67);
    }
    span {
        color: black;
    }
    div.imgWrapper {
        background-position: center;
        background-size: cover;
        width: 150px;
        height: 150px;
    }
    div img {
        max-width: 100%;
        max-height: 100%;
    }

    section {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        max-width: 1400px;
        margin: 0 auto;
        padding: 25px;
    }

    div.shoutbox-wrapper {
        flex:3;
        height: 600px; 
        box-shadow: 0px 0px 7px -1px rgba(0,0,0,1);
    }
    
    div.element {
        flex:1;
        background: linear-gradient(to right bottom, rgba(255,0,30,0.7) 0%, rgba(255,0,0,0.67) 34%, rgba(255,90,255,0.8) 100%);
        box-shadow: 0px 0px 7px -1px rgba(0,0,0,1);
        height: 600px;
        margin-right: 10px;
        flex-direction: column;
        align-content: center;
        justify-content: flex-start;
    }
     
    p.description {
        padding: 30px 25px 80px;
        color: white;
    }
    button {
        border: none;
        background: none;
        outline: none;
        display: block;
        margin: 0px auto;
        width: 170px;
    }
    .button {
        background: linear-gradient(to right bottom, rgba(255,255,255,0.9), rgba(0,0,0,0.1));
        border-radius: 50px;
        border: none;
        padding: 10px 20px;
        color: white;
        font-size: 20px;
        font-weight: 700;
        transition: 0.2s;
        text-decoration:none;
        width: 170px;
        display: inline-block;
    }
    
    .button:hover {
        box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.67);
    }
</style>