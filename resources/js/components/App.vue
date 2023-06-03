<template>
    <Header :is-logged-in="isLoggedIn" :user="user"/>
    <router-view @userLoggedIn="isUserLoggedIn" />
</template>

<script setup>
import Header from "./layout/header.vue";
import {ref} from "vue";

const isLoggedIn = ref(false)
const user = ref({})

const isUserLoggedIn = async (userObject) => {
    localStorage.setItem('isLoggedIn', userObject.loggedIn)
    isLoggedIn.value = userObject.loggedIn
    user.value = userObject
}
</script>
