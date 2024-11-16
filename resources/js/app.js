import './bootstrap';
import { createApp } from 'vue';
import ImageViewer from "./components/ImageViewer.vue";

const app = createApp({
    components: {
        ImageViewer,
    }
})

app.mount('#app')
