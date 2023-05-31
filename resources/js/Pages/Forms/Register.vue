<template>
    <main-layout>
        <form @submit.prevent="form.post(route('register.store'))">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input v-model="form.username" type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input v-model="form.email" type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label>
                <input v-model="form.phone" type="tel" class="form-control" name="phone" id="phone">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input v-model="form.password" type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" class="form-control" name="password_confirmation" id="password-confirmation">
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
            email: '',
            phone: '',
            password: '',
            password_confirmation: '',
        })

        return {form}
    },
    components: {
        MainLayout
    }
}

</script>
