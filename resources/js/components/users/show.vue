<template>
    <div class="container text-white mt-5">
        <div>
            <h5>Username:</h5>
            <p>{{ user.username }}</p>
        </div>
        <div>
            <h5>Email:</h5>
            <p>{{ user.email }}</p>
        </div>
        <div>
            <h5>Phone:</h5>
            <p>{{ user.phone }}</p>
        </div>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

onMounted(async () => {
    getUser()
})

const props = defineProps({
    id: {
        type: String,
        default: ''
    }
})

let user = ref({
    id: '',
    username: '',
    email: '',
    phone: '',
})

const getUser = async () => {
    let response = await axios.get(`/api/users/${props.id}`)
    user.value = response.data
}

</script>
