<template>
    <div class="d-flex flex-column align-items-center p-5">
        <h3 class="fs-3 my-3">CREATE A CATEGORY</h3>
        <form @submit.prevent="submit" class="d-flex flex-column align-items-center">
            <div class="my-3">
                <label for="name" class="me-3">NAME</label><br>
                <input type="text" id="name" name="name" v-model="form.name">
            </div>
            <button type="submit" class="btn btn-outline-danger">SAVE</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            form: this.$inertia.form({
                name: ''
            })
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('categories.store'), this.form, {
                onSuccess: () => {
                    this.form.reset();
                }
            });
        }
    }
}
</script>

<style scoped>

</style>
