<template>
    <div class="d-flex justify-content-between">
        <h1>Users</h1>
        <button @click="createUser">
            Create User
        </button>
    </div>
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
            <td>{{ user.username }}</td>
            <td>{{ user.email }}</td>
            <td>{{ user.phone }}</td>
            <td>
                <span>view</span>
                <button @click="editUser(user.id)">edit</button>
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
import {useRouter} from "vue-router"

onMounted(async () => {
    getUsers()
})

const router = useRouter()

let users = ref([])

const getUsers = async () => {
    let response = await axios.get("/api/user")
    users.value = response.data.users
}

const createUser = () => {
    router.push('/user/create')
}

const editUser = (id) => {
    router.push(`/user/${id}/edit`)
}

</script>
