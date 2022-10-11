<template>
    <div class="w-4/5 md:w-2/5 h-100 bg-white shadow-lg m-auto p-5 text-center flex flex-col justify-between items-center rounded-lg">
            <CheckIcon class="w-8 h-8 bg-green-500 rounded-full text-white"/>
            <h1 class="text-lg font-semibold">Uploaded Successfully!</h1>
            <div class="w-full h-4/6 rounded-md overflow-hidden">
                <img :src="imageUrl" alt="placeholder" class="w-full">
            </div>
            <div class="relative bg-gray-200 w-full rounded-lg p-1 h-auto text-left border-2 border-gray-400 flex flex-row justify-between text-sm md:text-base">
                <p class="w-10/12 p-2 truncate">{{ imageUrl }}</p>
                <button class="h-full bg-blue-500 p-2 text-white rounded-lg hover:bg-blue-600 active:bg-blue-700 text-xs md:text-base" @click="copy">Copy Link</button>
                <transition name="fade">
                    <div v-if="copied" class="absolute p-2 bg-overlay text-white rounded-md right-3 -top-12">
                        copied
                    </div>
                </transition>
            </div>
        </div>
</template>
<script>
import {CheckIcon} from '@heroicons/vue/solid'
import { copyText } from 'vue3-clipboard'

export default {
    components : {
        CheckIcon
    },
    data(){ 
        return {
            copied: false
        }
    },
    watch: {
        copied() {
            if(this.copied) {
                setTimeout(()=> {
                    this.copied = false
                }, 1000)
            }
        }
    },
    computed: {
        imageUrl() {
            return this.$store.state.imageUrl
        }
    },
    methods: {
        copy() {
            copyText(this.imageUrl, undefined, (error, event) => {
                if (error) {
                    alert('Can not copy')
                    console.log(error)
                } else {
                    this.copied = true
                }
            })
        }
    }

}
</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease-in;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

</style>