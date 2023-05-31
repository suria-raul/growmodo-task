<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav mb-2 mb-lg-0">
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
        <slot>Default</slot>
    </main>
</template>

<script>
import {Link} from "@inertiajs/vue3"

export default {
    components: {
        Link
    }
}

</script>
