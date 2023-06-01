<template>
    <div class="container mt-5">
        <h1 class="text-center text-white">Welcome {{ user.username }} !</h1>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

onMounted(() => {
    getCurrentUser()
})

const user = ref({
    username: '',
})

const getCurrentUser = () => {
    if (window.auth_user) {
        user.value = window.auth_user
    } else {
        user.value = null
    }
}
</script>
