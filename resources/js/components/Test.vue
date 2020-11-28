<template>
    <div>
        <button @click="flag = !flag">KLIK</button>
        <transition>
            <p v-if="flag">true</p>
        </transition>
          
    </div>
</template>

<script>
export default {
    data(){
        return {
            flag: false,
        }
    }
}
</script>