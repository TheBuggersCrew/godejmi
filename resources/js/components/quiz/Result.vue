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
    },
    props:["results"],
    methods: {
        async sendResults() {
            await axios.post('/api/questions/check', this.results).then(response => {
                this.validationConfirmed = response.data 
            })
        }
    },
    beforeMount() {
        this.sendResults()
    }
    
}
</script>