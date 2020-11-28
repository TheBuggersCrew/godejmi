<template>
    <div>
        <div v-if="validationConfirmed">WIWIWIWIWITAMY BUGEEEEEERZE</div>
        <div v-else-if="!validationConfirmed">Wydupiej z Piekor chuju</div>
        <div v-else>Loading</div>
    </div>
</template>


<script>
export default {
    data(){
        return {
            validationConfirmed: false,
        }
    }
}
</script>