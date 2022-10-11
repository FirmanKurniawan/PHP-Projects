import { createStore } from "vuex";

const store = createStore({
    state(){
        return {
            status : 0,
            imageUrl : null,
            doneUploading : false
        }
    },
    mutations: {
        setImageUrl(state, payload) {
            state.imageUrl = payload.url
        },
        setStatus(state, payload) {
            state.status = payload
        },
        setDoneUploading(state, payload) {
            state.doneUploading = payload
        }
    },
    actions : {
        async uploadImage({commit},formData) {
            await axios.post('/api/upload', formData, {
                header : {
                    'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)
                }
            }).then(response => {
                commit('setImageUrl', response.data)
                commit('setDoneUploading', true)
            }).catch(err => {
                console.log(err)
            })
        }
    }
})


export default store