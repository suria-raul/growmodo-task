<template>
    <div class="container mt-5">
        <h1 class="text-center text-white">Welcome {{ user.username }}!</h1>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

onMounted(() => {
    getCurrentUser()
})

const user = ref({
    username: '',
    email: '',
    phone: '',
})

const getCurrentUser = async () => {
    if (localStorage.API_TOKEN == undefined) {
        user.value = null
    } else {
        let response = await axios.get('api/user')
        user.value = response.data
    }
}
</script>
