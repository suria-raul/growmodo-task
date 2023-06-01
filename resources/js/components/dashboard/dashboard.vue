<template>
    <h1>Welcome {{ user.username }} !</h1>
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
