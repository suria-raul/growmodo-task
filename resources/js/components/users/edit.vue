<template>
    <form @submit.prevent="updateUser(form.id)">
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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

let errors = ref([])

const getUser = async () => {
    let response = await axios.get(`/api/user/${props.id}/edit`)
    form.value = response.data
    console.log(response.data)
}

const updateUser = (id) => {
    const formData = new FormData()
    formData.append('username', form.value.username)
    formData.append('email', form.value.email)
    formData.append('phone', form.value.phone)

    // I do not why put is not working here
    // cannot find the answer in the internet
    axios.post(`/api/user/${id}`, formData)
        .then((response) => {
            form.value.username = ''
            form.value.email = ''
            form.value.phone = ''
            form.value.password = ''
            form.value.password_confirmation = ''

            router.push(`/user/${id}/edit`)
            getUser()

            toast.fire({
                icon: "success",
                title: response.data.message
            })
        })
        .catch((error) => {
            // not tested
            errors.value = error
            console.log(error)
        })
}

</script>
