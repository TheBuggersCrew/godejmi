<template>
    <div>
        <div v-if="!loading"> 
            <div v-if="validationConfirmed">WIWIWIWIWITAMY BUGEEEEEERZE</div>
            <div v-else-if="!validationConfirmed">Wydupiej z Piekor chuju</div>
        </div>
        <div v-else>Loading</div>
    </div>
</template>


<script>
export default {
    data(){
        return {
            validationConfirmed: null,
            loading: false,
        }
    },
    props:["results"],

    created() {
        this.loading = true
        axios.post('/api/questions/check', this.results)
            .then(response => {
            this.validationConfirmed = response.data.success;
            this.loading = false})
        
    }
    
}
</script>