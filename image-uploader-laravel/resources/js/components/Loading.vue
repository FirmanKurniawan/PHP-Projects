<template>
    
    <div class="w-1/2 md:w-1/4 white shadow-xl m-auto p-5">
        <h1 class="text-lg font-semibold">Uploading</h1>
        <div class="w-full h-3 bg-gray-400 relative rounded-full mt-2 overflow-x-hidden">
            <div class="absolute w-1/4 h-full bg-blue-500 rounded-full" :style="{left:slideValue + '%'}"></div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            slideValue : 0,
            timer : null
        }
    },
    watch: {
        slideValue() {
            if(this.slideValue >= 150) {
                this.slideValue = 0
            }
        },
        doneUploading() {
            if(this.doneUploading) {
                clearInterval(this.timer)
                this.$store.commit('setStatus', 2)
            }
        }

    },
    mounted() {
        this.timer = setInterval(() => {
            this.slideValue += 1
        }, 10)
    },
    computed: {
        doneUploading() {
            return this.$store.state.doneUploading
        }
    },
}
</script>