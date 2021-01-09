<template>
    <div class="app">
        <nav>
            <router-link class="navbar-brand mr-auto" :to="{name: 'enterwindow'}"></router-link>
            <router-link class="navbar-brand mr-auto" :to="{name: 'homepage'}">Homepage</router-link>
        </nav>
        <div class="wrapper">
            <transition :enter-active-class="enterAnimation" :leave-active-class="leaveAnimation" mode="out-in">
                <router-view @changeAnimationHomePage="changeAnimationHomePage"></router-view>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
    props: ["isAuthorized"],
    data(){
        return {
            enterAnimation: "animate__animated animate__backInRight",
            leaveAnimation: "animate__animated animate__backOutDown",
        }
    },
    methods: {
         changeAnimationHomePage() {
             this.enterAnimation = "animate__animated animate__zoomInDown"
        }
    }
}
</script>

<style scoped>
    #app {
        width: 100vw;
        height: 100vh;
    }
    .app {
        width: 100vw;
        height: 100vh;
        position: relative;
    }
    .wrapper {
        position:absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%)
    }
</style>
