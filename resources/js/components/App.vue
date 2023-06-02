<template>
    <Header :is-logged-in="isLoggedIn"/>
    <router-view @userLoggedIn="isUserLoggedIn" />
</template>

<script setup>
import Header from "./layout/header.vue";
import {onMounted, ref} from "vue";

const isLoggedIn = ref(false)

const isUserLoggedIn = (value) => {
    isLoggedIn.value = value
}
</script>
