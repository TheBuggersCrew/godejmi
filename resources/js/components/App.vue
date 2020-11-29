<template>
    <div>
        <nav class="navbar navbar-light border-bottom">

            <router-link class="navbar-brand mr-auto" :to="{name: 'index'}">Index</router-link>
            <router-link class="navbar-brand mr-auto" :to="{name: 'test'}">Test</router-link>
            
        </nav>
        <div class="container-fluid p-3">
            <transition name="in" enter-active-class="animated fadeInRight" leave-active-class="animated fadeOutDown" mode="out-in">>
                <router-view></router-view>
            </transition>
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
    props: ['isAuthorized']
}
</script>

<style scoped>
    
</style>

<style>
    @import "https://cdn.jsdelivr.net/npm/animate.css@3.5.1";
</style>
