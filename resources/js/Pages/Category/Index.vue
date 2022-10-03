<template>
    <div class="col col-6 mx-auto py-5">
        <table class="table table-striped table-sm my-3">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="category in categories.data" :key="category.id">
                <th scope="row">{{ category.id }}</th>
                <td>{{ category.name }}</td>
                <td>
                    <Link :href="route('categories.destroy', category)" method="DELETE">
                        DELETE
                    </Link>
                </td>
                <td>
                    <Link :href="route('categories.edit', category)">
                        EDIT
                    </Link>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-center my-4">
            <div v-for="link in categories.links">
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
        categories: Array
    }
}
</script>

<style scoped>

</style>
