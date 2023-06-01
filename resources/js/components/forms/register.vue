<template>
    <form @submit.prevent="register">
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
            <input v-model="form.password_confirmation" type="password" class="form-control"
                   name="password_confirmation" id="password-confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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

const register = () => {
    const formData = new FormData()
    formData.append('username', form.value.username)
    formData.append('email', form.value.email)
    formData.append('phone', form.value.phone)
    formData.append('password', form.value.password)
    formData.append('password_confirmation', form.value.password_confirmation)

    axios.post("/register", formData)
        .then((response) => {
            form.value.username = ''
            form.value.email = ''
            form.value.phone = ''
            form.value.password = ''
            form.value.password_confirmation = ''

            router.push('/dashboard')

            toast.fire({
                icon: "success",
                title: response.data.message
            })
        })
        .catch((error) => {

        })
}


</script>
