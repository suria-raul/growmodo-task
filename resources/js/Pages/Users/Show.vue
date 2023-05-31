<template>
    <main-layout>
        <div>
            <h3>Username:</h3>
            <p>{{ user.username }}</p>
        </div>
        <div>
            <h3>Email:</h3>
            <p>{{ user.email }}</p>
        </div>
        <div>
            <h3>Phone:</h3>
            <p>{{ user.phone }}</p>
        </div>
    </main-layout>
</template>

<script setup>
import MainLayout from "../Layouts/MainLayout.vue";

defineProps({
    user: Object
})
</script>
