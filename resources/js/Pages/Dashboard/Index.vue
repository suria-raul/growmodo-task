<template>
    <main-layout>
        <h1>This is the dashboard!</h1>
        <Link :href="route('logout')" method="post" as="button">Logout</Link>
    </main-layout>
</template>

<script>
import {Link} from "@inertiajs/vue3"
import MainLayout from "../Layouts/MainLayout.vue";

export default {
    components: {
        Link, MainLayout
    }
}
</script>
