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
                <button @click="deleteUser(user.id)">delete</button>
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

const deleteUser = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone',
        icon: 'warning',
        showCancelButtonZ: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            axios.delete(`/api/user/${id}`)
                .then((res) => {
                    getUsers()
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    })
}
</script>
