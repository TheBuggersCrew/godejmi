<template>
    <div class="progressBar">
        <div class="progressBarbefore" :style="{left: this.barPosition + '%'}"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            oneProgressUnit: 100 / this.divider,
            barPosition: -100,
        }
    },
    props: ["questionCounter", "divider"],
    watch: {
        questionCounter() {
            let newBarPosition = Math.floor(this.barPosition + this.oneProgressUnit)

            if(this.questionCounter < 5) {
                let animation = setInterval(() => {
                    if(this.barPosition < newBarPosition) {
                        this.barPosition = this.barPosition + 0.5
                    }
                    else {
                        clearInterval(animation)
                    }
                }, 10)}

            else if(this.questionCounter === 5) {
                let animation = setInterval(() => {
                if(this.barPosition < 0) {
                    this.barPosition = this.barPosition + 0.3
                }
                else {
                    clearInterval(animation)
                    this.$emit('progressBarFullness')
                }
            }, 10)
            }
        }
    }
}
</script>

