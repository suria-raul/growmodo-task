<template>
    <h1>This is the dashboard!</h1>
    <Link :href="route('logout')" method="post">Logout</Link>
</template>

<script>
import {Link} from "@inertiajs/vue3"

export default {
    components: {
        Link
    }
}
</script>
