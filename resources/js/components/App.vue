<template>
    <Header/>
    <router-view/>
</template>

<script setup>
import Header from "./layout/header.vue";
import {onMounted} from "vue";
</script>
