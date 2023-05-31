<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul v-if="user" class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link class="nav-link text-capitalize" :href="route('logout')" method="post" as="button">Logout</Link>
                    </li>
                </ul>
                <ul v-else class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <Link class="nav-link text-capitalize" :href="route('login.show')">login</Link>
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link text-capitalize" :href="route('register.show')">register</Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container-fluid">
        <div v-if="$page.props.flash.message" class="text-bg-info text-white">
            {{ flashMessage }}
        </div>
        <div v-if="$page.props.flash.success" class="text-bg-success text-white">
            {{ flashSuccess }}
        </div>
        <slot>Default</slot>
    </main>
</template>

<script>
import {Link, usePage} from "@inertiajs/vue3"
import {computed} from "vue"

export default {
    setup() {
        const flashSuccess = computed(
            () => usePage().props.flash.success,
        )

        const flashMessage = computed(
            () => usePage().props.flash.message,
        )

        const user = computed(
            () => usePage().props.user,
        )

        return {user, flashMessage, flashSuccess}
    },
    components: {
        Link
    }
}

</script>
