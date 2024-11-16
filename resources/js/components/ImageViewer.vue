<script>
import axios from 'axios';
export default {
    name: "ImageViewer",
    data() {
        return {
            selectedFile: null,
            images: [],
        };
    },
    methods: {
        onFileChange(event) {
            this.selectedFile = event.target.files[0];
        },
        async uploadImage() {
            const formData = new FormData();
            formData.append('image', this.selectedFile);

            axios.post('http://localhost:8000/api/images/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data',
                },
            }).then(() => {
                this.fetchImages();
            });
            this.selectedFile = null; // Reset the file input after upload
        },
        async fetchImages() {
            const response = await axios.get('http://localhost:8000/api/images');
            this.images = response.data.images;
        },
    },
    mounted() {
        this.fetchImages();
    },
}
</script>

<template>
    <div>
        <h1>Image Uploader</h1>
        <input type="file" @change="onFileChange" accept="image/*" />
        <button @click="uploadImage" :disabled="!selectedFile">Upload Image</button>
        <h2>Image List</h2>
        <ul>
            <li v-for="image in images" :key="image.id">
                <img :src="`/storage/${image.path}`" :alt="image.url" width="100" />
                <p>{{ image.url }}</p>
            </li>
        </ul>
    </div>
</template>

<style scoped>

</style>
