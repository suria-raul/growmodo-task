<template>
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
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <span>view</span>
                <span>edit</span>
                <span>delete</span>
            </td>
        </tr>
        </tbody>
    </table>
</template>

<script setup>
import {onMounted, ref} from "vue";

onMounted(async () => {
    getUsers()
})

const getUsers = async () => {
    let response = await axios.get("/api/user")
    console.log('users', response)
}

</script>
