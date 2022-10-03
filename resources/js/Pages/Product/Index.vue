<template>
    <div class="col col-6 mx-auto py-5">
        <table class="table table-striped table-sm my-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products.data" :key="product.id">
                <th scope="row">{{ product.id }}</th>
                <td>{{ product.name }}</td>
                <td>{{ product.price }}</td>
                <td>{{ product.description }}</td>
                <td>
                    <Link :href="route('products.destroy', product)" method="DELETE">
                        DELETE
                    </Link>
                </td>
                <td>
                    <Link :href="route('products.edit', product)">
                        EDIT
                    </Link>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <div v-for="link in products.links">
                <Link class="px-3 py-1 mx-1 rounded rounded-3 bg-danger text-white"
                      :href="link.url"
                      v-html="link.label"/>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "Index",
    components: {
      Link
    },
    props: {
        products: Array
    }
}
</script>

<style scoped>

</style>
