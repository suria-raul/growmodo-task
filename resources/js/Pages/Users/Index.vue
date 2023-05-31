<template>
    <main-layout>
        <h1>Users</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users" :key="user.id">
                <td>{{ user.username }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.phone }}</td>
                <td>
                    <a :href="route('user.show', user)">
                        view
                    </a>
                    <button @click="deleteUser(user.id)">
                        Delete
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </main-layout>
</template>

<script setup>
import MainLayout from "../Layouts/MainLayout.vue"
import {onMounted, ref} from "vue"
import axios from "axios"

const users = ref([]);

const getUsers = () => {
    axios.get('/api/users')
        .then(response => users.value = response.data.data)
        .catch(error => console.log(error))
}

const deleteUser = (userId) => {
    axios.delete('/api/user/' + userId)
        .then(res => {
            if (res.data.isDeleted) {
                alert(res.data.message)
                window.location.reload()
            }
        })
}

onMounted(() => getUsers())
</script>
