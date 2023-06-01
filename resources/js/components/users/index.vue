<template>
    <div class="container mt-5 mb-3 d-flex justify-content-between align-items-center">
        <h1 class="text-white">Users</h1>
        <button @click="createUser" class="btn btn-primary">
            Create User
        </button>
    </div>
    <div v-if="users.length > 0" class="container table-responsive">
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
            <tr v-for="user in users">
                <td>{{ user.username }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.phone }}</td>
                <td>
                    <button class="m-1 text-capitalize btn btn-success" @click="viewUser(user.id)">view</button>
                    <button class="m-1 text-capitalize btn btn-primary" @click="editUser(user.id)">edit</button>
                    <button class="m-1 text-capitalize btn btn-danger" @click="deleteUser(user.id)">delete</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div v-else class="container">
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

const viewUser = (id) => {
    router.push(`/user/${id}`)
}

const deleteUser = (id) => {
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.value) {
            axios.delete(`/api/user/${id}`)
                .then((res) => {
                    getUsers()

                    toast.fire({
                        icon: "success",
                        title: res.data.message
                    })
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    })
}
</script>
