<template>
    <div class="w-4/5 md:w-1/2 lg:w-1/4 h-100 bg-white shadow-lg m-auto p-5 text-center flex flex-col justify-between items-center rounded-lg">
        <h1 class="text-lg font-semibold">upload your image</h1>
        <p class="text-xs py-3">File should be Jpeg, Png,..</p>
        <div class="w-full  bg-gray-10 border-2 border-blue-400 border-dashed rounded-md" @drop="drop" @dragover="dragOver" @dragleave="dragLeave">
            <img src="/img/placeholder.svg" alt="placeholder" class="w-1/2 m-auto opacity-50 mt-2">
            <p class="opacity-50 text-sm py-3">Drag & Drop your image here</p>
        </div>
        <p>Or</p>
        <label class="bg-blue-600 w-1/2 md:w-2/5 p-2 rounded-sm h-auto cursor-pointer">
            <span class="text-white">Choose a file</span>
            <input type="file" class="hidden" ref="file" @change="onChange">
        </label>
    </div>
</template>
<script>
export default {
    data() {
        return {
            image : null,
        }
    },
    methods: {
        onChange() {
            this.image = this.$refs.file.files[0]

            this.uploadImage()
        },
        drop(event) 
        {
            event.preventDefault()
            this.$refs.file.files = event.dataTransfer.files
            this.onChange();

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

            formData.append('image', this.image)

            //Post request to api
            this.$store.dispatch('uploadImage', formData)

            this.$store.commit('setStatus', 1)
        }   
    }

}
</script>