<template>
    <div class="container mt-5">
        <form @submit.prevent="login" class="p-5 mx-auto rounded bg-white">
            <div class="mb-3">
                <h2 class="text-center bold">Login</h2>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Email or Username</label>
                <input v-model="form.username" type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input v-model="form.password" type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary w-100 rounded-pill">Submit</button>
        </form>
    </div>
</template>
<script setup>
import {ref} from "vue";
import {useRouter} from "vue-router";

let form = ref({
    username: '',
    password: '',
})

const router = useRouter()

let errors = ref([])

const login = () => {
    const formData = new FormData()
    formData.append('username', form.value.username)
    formData.append('password', form.value.password)

    axios.post("/login", formData)
        .then((response) => {
            form.value.username = ''
            form.value.password = ''

            if (response.data.logged_in) {
                window.auth_user = response.data.user
                router.push('/dashboard')

                toast.fire({
                    icon: "success",
                    title: response.data.message
                })
            } else {
                Swal.fire({
                    title: response.data.message,
                    icon: 'error',
                    confirmButtonText: 'Yes'
                })
            }
        })
        .catch((error) => {
            // not tested
            errors.value = error
            console.log(error)
        })
}

</script>
