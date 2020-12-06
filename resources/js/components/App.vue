<template>
    <div>
        <nav class="navbar navbar-light border-bottom">
            <router-link class="navbar-brand mr-auto" :to="{name: 'index'}">Index</router-link>
            <router-link class="navbar-brand mr-auto" :to="{name: 'homepage'}">Homepage</router-link>
        </nav>
        <div class="container-fluid p-3">
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

<style>
</style>
