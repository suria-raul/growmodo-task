<template>
    <main-layout>
        <form @submit.prevent="updateUser(user.id)">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input v-model="user.username" type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input v-model="user.email" type="email" class="form-control" name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label>
                <input v-model="user.phone" type="tel" class="form-control" name="phone" id="phone">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input v-model="user.password" type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main-layout>
</template>

<script setup>
import MainLayout from "../Layouts/MainLayout.vue"

defineProps({
    user: Object
})
const updateUser = (userId) => {}

</script>
