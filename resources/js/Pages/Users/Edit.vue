<template>
    <main-layout>
        <form @submit.prevent="update">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input v-model="user.username" type="text" class="form-control" name="username" id="username">
                <div v-if="form.errors.username" class="text-danger">{{ form.errors.username }}</div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input v-model="user.email" type="email" class="form-control" name="email" id="email">
                <div v-if="form.errors.email" class="text-danger">{{ form.errors.email }}</div>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone number</label>
                <input v-model="user.phone" type="tel" class="form-control" name="phone" id="phone">
                <div v-if="form.errors.phone" class="text-danger">{{ form.errors.phone }}</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </main-layout>
</template>

<!--<script>-->
<!--import MainLayout from "../Layouts/MainLayout.vue";-->
<!--import {useForm} from "@inertiajs/vue3";-->

<!--export default {-->
<!--    setup() {-->
<!--        const form = useForm({-->
<!--            id: this.props.user.id,-->
<!--            username: this.props.user.username,-->
<!--            email: this.props.user.email,-->
<!--            phone: this.props.user.phone,-->
<!--        })-->

<!--        return {form}-->
<!--    },-->
<!--    components: {-->
<!--        MainLayout,-->
<!--    },-->
<!--    props: {-->
<!--        user: Object,-->
<!--    },-->
<!--}-->
<!--</script>-->

<script setup>
import MainLayout from "../Layouts/MainLayout.vue"
import axios from "axios"
import {useForm} from "@inertiajs/vue3"

const props = defineProps({
    user: Object
})

const form = useForm({
    username: props.user.username,
    email: props.user.email,
    phone: props.user.phone,
})
const update = () => form.put(`/api/user/${props.user.id}`)
// cant make this work
// 422 status code
// stack overflow said it is because of my server
// const updateUser = () => {
//     console.log(props.user)
//     axios.put(`/api/user/${props.user.id}`, props.user)
//         .then(res => {
//             if (res.data.isUpdated) {
//                 alert(res.data.message)
//                 window.location.reload()
//             }
//         }).catch(error => console.log(error))
// }

</script>
