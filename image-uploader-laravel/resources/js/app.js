import { createApp } from 'vue'

import VueClipboard from 'vue3-clipboard'
import Home from './components/Home.vue'
import store from './store/index'



const app = createApp({});

app.component('home', Home)
    .use(VueClipboard, {
        autoSetContainer: true,
        appendToBody: true,
    })
    .use(store)
    .mount("#app");

require('./bootstrap');



