<template>
    <div>
        <button @click="flag = !flag">KLIK</button>
        <transition name="bounce">
            <button v-if="flag">SIEEEEMANKO</button>
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

<style scoped>
button {
    color: rgb(240, 61, 61, 1);
    font-weight: 500;
    padding: 7px 15px;
    width: 120px;
    background-color: white;
    border: none;
}

.bounce-enter-active{
    animation: bounceIn 0.4s  ease
}

.bounce-leave-active {  
    animation: bounceIn 0.4s ease reverse;

}

@keyframes bounceIn { 
    1% {
        transform: scale(0.1);
        opacity: 0;
    }
    60% {
        transform: scale(1.3);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}
</style>