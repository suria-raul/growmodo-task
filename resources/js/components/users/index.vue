<template>
    <h1>Users</h1>
    <table class="table" v-if="users.length > 0">
        <thead>
        <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users">
            <td>{{user.username}}</td>
            <td>{{user.email}}</td>
            <td>{{user.phone}}</td>
            <td>
                <span>view</span>
                <span>edit</span>
                <span>delete</span>
            </td>
        </tr>
        </tbody>
    </table>
    <div v-else>
        No users found
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";

onMounted(async () => {
    getUsers()
})

let users = ref([])

const getUsers = async () => {
    let response = await axios.get("/api/user")
    users.value = response.data.users
}

</script>
