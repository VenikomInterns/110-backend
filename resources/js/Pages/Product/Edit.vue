<template>
    <div class="d-flex flex-column align-items-center p-5">
        <h3 class="fs-3 my-3">CREATE A PRODUCT</h3>
        <form @submit.prevent="submit" class="d-flex flex-column align-items-center">
            <div class="my-3">
                <label for="name" class="me-3">NAME</label><br>
                <input type="text" id="name" name="name" v-model="form.name">
            </div>
            <div class="my-3">
                <label for="price" class="me-3">PRICE</label><br>
                <input type="text" id="price" name="price" v-model="form.price">
            </div>
            <div class="my-3">
                <label for="description" class="me-3">DESCRIPTION</label><br>
                <textarea type="text" id="description" name="description" v-model="form.description"></textarea>
            </div>
            <div class="my-3">
                <label for="category_id" class="me-3">CATEGORY</label><br>
                <select type="text" id="category_id" name="category_id" v-model="form.category_id">
                    <option v-for="category in categories" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-danger">SAVE</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Edit",
    props: {
        categories: Array,
        product: Object
    },
    data() {
        return {
            form: this.$inertia.form({
                name: this.product.name,
                price: this.product.price,
                description: this.product.description,
                category_id: this.product.category_id,
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.put(route('products.update', this.product), this.form);
        }
    }
}
</script>

<style scoped>

</style>
