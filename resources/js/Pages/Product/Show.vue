<template>
    <div class="ps-2 fs-5">
        <ol>
            <li>
                PRODUCT NAME: <span class="ps-2">{{ product.name }}</span>
            </li>
            <li>
                PRODUCT PRICE: <span class="ps-2">{{ product.price }}</span>
            </li>
            <li>
                PRODUCT DESCRIPTION: <span class="ps-2">{{ product.description }}</span>
            </li>
            <li class="list-inline-item" v-for="productImage in product.images">
                <img :src="getImagePath(productImage.image)" alt="Photo alt" width="500" height="500"/>
            </li>
        </ol>
    </div>
</template>

<script>
export default {
    name: "Show",
    props: {
        product: Object
    },
    methods: {
        getImagePath(image) {
            return new URL('../../../../storage/app/public/images/' + image, import.meta.url).href;
            //this won't work in production. I guess it will only work when running npm run dev. This is very wrong. You need to generate the public url from the backend 
        }
    }
}
</script>

<style scoped>

</style>
