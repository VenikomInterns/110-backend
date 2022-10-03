<template>
    <div class="ps-2 fs-5">
       NAME: {{ category.name }}
        <ol> PRODUCTS:
            <li class="d-inline mx-3" v-for="product in category.products">
                {{ product.name }}
            </li>
        </ol>
    </div>
</template>

<script>
export default {
    name: "Show",
    props: {
        category: Object
    }
}
</script>

<style scoped>

</style>
