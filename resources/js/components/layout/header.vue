<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container d-flex justify-content-end">
            <router-link class="navbar-brand" to="/dashboard">
                Home
            </router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul v-if="isLoggedIn || showNavbarForLoggedInUser" class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <router-link class="nav-link text-capitalize text-center" to="/users">View Records</router-link>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-capitalize text-center">Unsubscribe</button>
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
import {computed, onMounted, ref} from "vue";

onMounted(() => {
    showLoggedInNavbar()
})

const props = defineProps({
    isLoggedIn: Boolean,
    user: Object
})

const showNavbarForLoggedInUser = ref()
const showLoggedInNavbar = () => {
    if (localStorage.getItem('isLoggedIn')) {
        showNavbarForLoggedInUser.value = true
    }
}

const router = useRouter()

const logout = () => {
    axios.post('/logout')
        .then((response) => {
            localStorage.removeItem('API_TOKEN')
            localStorage.removeItem('isLoggedIn')
            window.location.href = '/'
        })
}
</script>
