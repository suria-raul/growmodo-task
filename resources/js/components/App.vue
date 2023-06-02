<template>
    <Header :is-logged-in="isLoggedIn"/>
    <router-view @userLoggedIn="isUserLoggedIn" />
</template>

<script setup>
import Header from "./layout/header.vue";
import {ref} from "vue";

const isLoggedIn = ref(false)

const isUserLoggedIn = async (value) => {
    localStorage.setItem('isLoggedIn', value)
    isLoggedIn.value = value
}
</script>
