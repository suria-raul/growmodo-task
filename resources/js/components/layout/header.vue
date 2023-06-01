<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navigation" aria-controls="navigation"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
<!--                <ul class="navbar-nav mb-2 mb-lg-0">-->
<!--                    <li class="nav-item">-->
<!--                        <a class="nav-link text-capitalize" href="#">View Records</a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <button class="nav-link text-capitalize" @click="logout">Logout</button>-->
<!--                    </li>-->
<!--                </ul>-->
                <ul v-else class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="/">login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="/register">register</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link text-capitalize" @click="logout">Logout</button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import {onMounted, ref} from "vue";
import {useRouter} from "vue-router";

const router = useRouter()

const logout = () => {
    axios.post('/logout')
        .then((response) => {
            router.push('/')

            toast.fire({
                icon: "success",
                title: response.data.message
            })
        })
        .catch((error) => {

        })
}
</script>
