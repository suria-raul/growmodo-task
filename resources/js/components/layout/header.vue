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
                    <li v-if="isAdmin || isCurrentAdmin" class="nav-item">
                        <router-link class="nav-link text-capitalize text-center" to="/users">View Records</router-link>
                    </li>
                    <li v-else class="nav-item">
                        <button class="nav-link text-capitalize text-center" @click="unsubscribe">Unsubscribe</button>
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

defineProps({
    isLoggedIn: Boolean,
    isAdmin: Boolean
})

const showNavbarForLoggedInUser = ref()
const showLoggedInNavbar = () => {
    if (localStorage.getItem('isLoggedIn')) {
        showNavbarForLoggedInUser.value = true
    }
}

const router = useRouter()
const currentUser = ref()
const logout = () => {
    axios.post('/logout')
        .then((response) => {
            localStorage.removeItem('API_TOKEN')
            localStorage.removeItem('isLoggedIn')
            localStorage.removeItem('isAdmin')
            window.location.href = '/'
        })
}

const unsubscribe = async () => {
    let defaultHeader = {
        headers: {
            Authorization: 'Bearer ' + localStorage.getItem('API_TOKEN')
        }
    }

    let res = await axios.get("/api/user", defaultHeader)
    currentUser.value = res.data

    let unsubResponse = await axios.post(`/unsubscribe/${currentUser.value.id}`, defaultHeader)

    toast.fire({
        icon: "success",
        title: unsubResponse.data.message
    })
}

const isCurrentAdmin = () => {
    if (localStorage.getItem('isAdmin')) {
        return true;
    }
}
</script>
