<template>
    <Header :is-logged-in="isLoggedIn" :is-admin="isAdmin"/>
    <router-view @userLoggedIn="isUserLoggedIn"/>
</template>

<script setup>
import Header from "./layout/header.vue";
import {ref} from "vue";

const isLoggedIn = ref(false)
const currentUserRole = ref()
const currentUser = ref()
const isAdmin = ref()

const isUserLoggedIn = async (loggedIn) => {
    localStorage.setItem('isLoggedIn', loggedIn)
    isLoggedIn.value = loggedIn
    getRole()
}

const getRole = async () => {
    let defaultHeader = {
        headers: {
            Authorization: 'Bearer ' + localStorage.getItem('API_TOKEN')
        }
    }

    let user = await axios.get("/api/user", defaultHeader)
    currentUser.value = user.data

    let role = await axios.get(`/get-role/${currentUser.value.id}`, defaultHeader)
    currentUserRole.value = role.data
    // console.log(currentUserRole.value)
    isAdmin.value = currentUserRole.value == 'administrator'
    localStorage.setItem('isAdmin', isAdmin.value)
}
</script>
