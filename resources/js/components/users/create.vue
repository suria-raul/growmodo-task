<template>
    <div class="container mt-5">
        <form @submit.prevent="saveUser" class="p-5 mx-auto rounded bg-white">
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
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input v-model="form.password" type="password" class="form-control" name="password" id="password" required>
            </div>
            <div class="mb-3">
                <label for="password-confirmation" class="form-label">Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" class="form-control"
                       name="password_confirmation" id="password-confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">Submit</button>
        </form>
    </div>
</template>

<script setup>
import {ref} from "vue";
import {useRouter} from "vue-router";

const router = useRouter()

let form = ref({
    username: '',
    email: '',
    phone: '',
    password: '',
    password_confirmation: '',
})

const promptMessage = (response) => {
    router.push('/users')

    toast.fire({
        icon: "success",
        title: response.data.message
    })
}

const saveUser = async () => {
    const formData = new FormData()
    formData.append('username', form.value.username)
    formData.append('email', form.value.email)
    formData.append('phone', form.value.phone)
    formData.append('password', form.value.password)
    formData.append('password_confirmation', form.value.password_confirmation)

    let response = await axios.post("/api/users", formData, {
        headers:  {
            Authorization: 'Bearer ' + localStorage.getItem('API_TOKEN'),
        }
    })
    promptMessage(response)
}

</script>
