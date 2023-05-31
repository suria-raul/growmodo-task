<template>
    <main-layout>
        <form @submit.prevent="form.post(route('login'))">
            <div class="mb-3">
                <label for="username" class="form-label">Email address or Username</label>
                <input v-model="form.username" type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input v-model="form.password" type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main-layout>
</template>

<script>
import {useForm} from "@inertiajs/vue3";
import MainLayout from "../Layouts/MainLayout.vue";

export default {
    setup() {
        const form = useForm({
            username: '',
            password: '',
        })

        return {form}
    },
    components: {
        MainLayout
    }
}

</script>
