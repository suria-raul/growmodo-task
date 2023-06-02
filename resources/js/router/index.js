import {createRouter, createWebHistory} from "vue-router";
import users from "../components/users/index.vue";
import createUser from "../components/users/create.vue";
import showUser from "../components/users/show.vue";
import editUser from "../components/users/edit.vue";
import loginForm from "../components/forms/login.vue";
import registerForm from "../components/forms/register.vue";
import dashboard from "../components/dashboard/dashboard.vue";

const routes = [
    {
        path: '/',
        component: loginForm
    },
    {
        path: '/register',
        component: registerForm
    },
    {
        path: '/dashboard',
        component: dashboard
    },
    {
        path: '/users',
        component: users
    },
    {
        path: '/users/create',
        component: createUser
    },
    {
        path: '/users/:id',
        component: showUser,
        props: true
    },
    {
        path: '/users/:id/edit',
        component: editUser,
        props: true
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL), routes
})
export default router
