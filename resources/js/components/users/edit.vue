<template>
    <div class="container mt-5">
        <form @submit.prevent="updateUser(form.id)" class="p-5 mx-auto rounded bg-white">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input v-model="form.username" type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input v-model="form.email" type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label>
                <input v-model="form.phone" type="tel" class="form-control" name="phone" id="phone" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">Submit</button>
        </form>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import {useRouter} from "vue-router";

onMounted(async () => {
    getUser()
})

const props = defineProps({
    id: {
        type: String,
        default: ''
    }
})

let form = ref({
    id: '',
    username: '',
    email: '',
    phone: '',
})

const router = useRouter()

const getUser = async () => {
    let response = await axios.get(`/api/users/${props.id}/edit`, {
        headers:  {
            Authorization: 'Bearer ' + localStorage.getItem('API_TOKEN'),
        }
    })
    form.value = response.data
}

const promptMessage = (response) => {
    router.push('/users')
    getUser()

    toast.fire({
        icon: "success",
        title: response.data.message
    })
}

const updateUser = async (id) => {
    const formData = new FormData()
    formData.append('username', form.value.username)
    formData.append('email', form.value.email)
    formData.append('phone', form.value.phone)
    formData.append('_method', 'PUT')

    let response = await axios.post(`/api/users/${id}`, formData, {
        headers:  {
            Authorization: 'Bearer ' + localStorage.getItem('API_TOKEN'),
        }
    })
    promptMessage(response)
}

</script>
