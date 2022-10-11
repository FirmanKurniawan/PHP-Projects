<template>
    <div class="flex flex-col h-screen w-full items-center">
        <Upload v-if="status == 0"/>
        <Loading v-if="status == 1"/>
        <Result v-if="status == 2"/>
    </div>
</template>

<script>
import Loading from './Loading.vue'
import Result from './Result.vue'
import Upload from './Upload.vue'


export default {
    components: {
        Loading,
        Result,
        Upload
    },
    data() {
        return {
            image : null,
        }
    },
    computed : {
        status() {
            return this.$store.state.status
        }
    },
    methods: {
        onChange() {
            this.image = this.$refs.file.files[0]
        },
        drop(event) 
        {
            event.preventDefault()
            this.$refs.file.files = event.dataTransfer.files
            this.onChange();

            this.uploadImage()
        },
        dragOver(event) {
            event.preventDefault();

            if (!event.currentTarget.classList.contains('bg-gray-200')) {
                event.currentTarget.classList.remove('bg-gray-100');
                event.currentTarget.classList.add('bg-gray-300');
            }
        },
        dragLeave(event) {
            event.preventDefault();
            event.currentTarget.classList.remove('bg-gray-300')
            event.currentTarget.classList.add('bg-gray-100')
        },
        uploadImage() {
            let formData = new FormData()

            formData.append('photo', this.image)

            //Post request to api
            this.$store.dispatch('uploadImage', formData)
        }   
    }
}
</script>