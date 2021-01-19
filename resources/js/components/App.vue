<template>
    <div class="app">
        <div class="wrapper">
            <transition :enter-active-class="enterAnimation" :leave-active-class="leaveAnimation" mode="out-in">
                <router-view></router-view>
            </transition>
        </div>
        <nav>
            <router-link class="navbar-brand mr-auto" :to="{name: 'enterwindow'}"></router-link>
            <router-link class="navbar-brand mr-auto" :to="{name: 'homepage'}">Homepage</router-link>
            <router-link class="navbar-brand mr-auto" :to="{name: 'name-randomiser'}">stare godejmi</router-link>
        </nav>
    </div>
</template>

<script>

import { mapState } from 'vuex'
import scrollLock from 'scroll-lock'

export default {
    name: "App",
    
    props: ["isAuthorized"],

    computed: {
        ...mapState(["enterAnimation"]),
        ...mapState(["leaveAnimation"])
    },

    created() {
        scrollLock.disablePageScroll()
    },
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
    }
    
    .wrapper {
        position: relative;
        width: 100%;
        height: 100%;
    }
    nav {
        position: fixed;
        top: 0%;
        left: 90%;
    }
</style>
