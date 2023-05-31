<template>
    <main-layout>
        <h1>Welcome {{ user.name }}!</h1>
    </main-layout>
</template>

<script>
import MainLayout from "../Layouts/MainLayout.vue";
import {usePage} from "@inertiajs/vue3";

export default {
    setup() {
        const user = usePage().props.user

        return {user}
    },
    components: {
        MainLayout
    }
}
</script>
