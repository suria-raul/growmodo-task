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
    let response = await axios.get('api/user', {
        headers: {
            Authorization: 'Bearer ' + localStorage.getItem('API_TOKEN')
        }
    })
    user.value = response.data
}
</script>
