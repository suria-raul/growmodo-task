<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container d-flex justify-content-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul v-if="user" class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-capitalize text-center" href="#">View Records</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-capitalize text-center" @click="logout">Logout</button>
                    </li>
                </ul>
                <ul v-else class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-capitalize text-center" href="/">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize text-center" href="/register">register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import {useRouter} from "vue-router";

onMounted(() => {
    getCurrentUser()
})

const router = useRouter()

const user = ref({})

const getCurrentUser = () => {
    if (window.auth_user) {
        user.value = window.auth_user
    } else {
        user.value = null
    }
}

const logout = () => {
    axios.post('/logout')
        .then((response) => {
            getCurrentUser()
            router.push('/')

            toast.fire({
                icon: "success",
                title: response.data.message
            })
        })
        .catch((error) => {

        })
}
</script>
