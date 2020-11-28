<template>
    <div class="progressBar">
        <div class="progressBarbefore" :style="{left: barPosition + '%'}"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            barPosition: -100,
        }
    },
    computed: {
        oneProgressUnit() {
            return(100 / this.divider)
        }
        
    },
    props: ["questionCounter", "divider", "nextQuestion"],
    watch: {
        questionCounter() {
            let newBarPosition = Math.floor(this.barPosition + this.oneProgressUnit)

            if(this.questionCounter < this.divider) {
                let animation = setInterval(() => {
                    if(this.barPosition < newBarPosition) {
                        this.barPosition = this.barPosition + 1
                    }
                    else {
                        clearInterval(animation)
                    }
                }, 10)}

            else if(this.questionCounter === this.divider) {
                let animation = setInterval(() => {
                if(this.barPosition < 0) {
                    this.barPosition = this.barPosition + 0.5
                }
                else {
                    clearInterval(animation)
                    this.nextQuestion()
                }
            }, 10)
            }
        }
    }
}
</script>

<style scoped>

div.progressBar {
    position: relative;
    width: 180px;
    height: 8px;
    border-radius: 15px;
    overflow: hidden;
    background-color: #4a4e65;
}

div.progressBarbefore {
    content: "";
    position: absolute;
    top: 50%;
    left: -100%;
    transform: translate(0, -50%);
    width: 100%;
    height: 100%;
    display: block;
    border-radius: 15px;
    background-color:  white;
    background-size: 40px 40px;
    background-image: linear-gradient(135deg, rgba(205,204,204,0.5) 25%, transparent 25%,
    transparent 50%, rgba(205,204,204,0.5) 50%,
    rgba(205,204,204,0.5) 75%, transparent 75%,
    transparent);
    animation: animate-stripes 4s linear infinite;
}
@keyframes animate-stripes {
    0% { background-position: 0 0; }
    100% { background-position: 80px 0; }
}
@keyframes showBtn {
    0% {
        transform: scale(0)
    }
    100% {
        transform: scale(1)
    }
}
</style>