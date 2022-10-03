<template>
    <div class="d-flex flex-column align-items-center">
        <div v-for="uploadedImage in images">
            <img :src="getImagePath(uploadedImage.image)" alt="Photo alt" width="500" height="500"/>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
    props: {
        images: Array
    },
    methods: {
        getImagePath(image) {
            return new URL('../../../../storage/app/public/images/' + image, import.meta.url).href;
        }
    }
}
</script>

<style scoped>

</style>
