<template>
    <form @submit.prevent="login">
        <div class="mb-3">
            <label for="username" class="form-label">Email address or Username</label>
            <input v-model="form.username" type="text" class="form-control" name="username" id="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input v-model="form.password" type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
                router.push('/user')

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
