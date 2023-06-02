<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container d-flex justify-content-end">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul v-if="isLoggedIn" class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link text-capitalize text-center" to="/dashboard">
                            Dashboard
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link text-capitalize text-center" to="/users">View Records</router-link>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-capitalize text-center" @click="logout">Logout</button>
                    </li>
                </ul>
                <ul v-else class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link text-capitalize text-center" to="/">login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link text-capitalize text-center" to="/register">register</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {useRouter} from "vue-router";

defineProps({
    isLoggedIn: {
        type: Boolean,
        default: false
    }
})

const router = useRouter()

const logout = () => {
    axios.post('/logout')
        .then((response) => {
            localStorage.removeItem('API_TOKEN')
            router.push('/')

            toast.fire({
                icon: "success",
                title: response.data.message
            })
        })
}
</script>
