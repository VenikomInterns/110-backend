<template>
    <div class="py-5">
        <!----We dont need enctype multpart form date when using vue to submit da form-->
        <form @submit.prevent="submit" enctype="multipart/form-data" method="post" class="d-flex flex-column align-items-center">
            <div class="my-3 d-flex flex-column justify-content-center">
                <label for="image" class="me-3 my-1 text-center">UPLOAD IMAGE HERE:</label><br>
                <input type="file" id="image" name="image" ref="photo" @change="handleChange" class="border border-1 p-0 border-dark">
            </div>
            <div class="my-3">
                <label for="product_id" class="me-3 my-1">PRODUCT</label><br>
                <select type="text" id="product_id" name="product_id" v-model="form.product_id">
                    <option v-for="product in products" :value="product.id"> <!---What if our shop has thousands of products? Is this good-->
                        {{ product.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-outline-danger">SAVE</button>
        </form>
    </div>
</template>

<script>
import {useForm} from "@inertiajs/inertia-vue3";

export default {
    name: "Create",
    props: {
        products: Array
    },
    data() {
        return {
            message: ''
        }
    },
    setup() {
        const form = useForm({
            image: '',
            product_id: '',
        });

        const submit = () => {
            form.post(route("images-upload.store"), {
                onSuccess: () => {
                    form.reset();
                }
            });
        }

        const handleChange = (e) => {
            const file = e.target.files[0];
            if (!file) return;
            form.image = file;
            console.log(form.image); // we don't leave console.logs
        }

        return {form, handleChange, submit}
    },
}
</script>

<style scoped>

</style>
