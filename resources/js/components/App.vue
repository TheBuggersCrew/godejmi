<template>
    <div>
        <nav class="navbar navbar-light border-bottom">

            <router-link class="navbar-brand mr-auto" :to="{name: 'index'}">Index</router-link>
            <router-link class="navbar-brand mr-auto" :to="{name: 'test'}">Test</router-link>
        </nav>
        <div class="container-fluid p-3">
            <router-view></router-view>
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
    
</style>
