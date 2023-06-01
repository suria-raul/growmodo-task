import {createRouter, createWebHistory} from "vue-router";
import users from "../components/users/index.vue";
import createUser from "../components/users/create.vue";
import showUser from "../components/users/show.vue";
import editUser from "../components/users/edit.vue";
import loginForm from "../components/forms/login.vue";
import registerForm from "../components/forms/register.vue";
import dashboard from "../components/dashboard/dashboard.vue";
import notFound from "../components/notfound.vue";

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
        path: '/user',
        component: users
    },
    {
        path: '/user/create',
        component: createUser
    },
    {
        path: '/user/:id',
        component: showUser,
        props: true
    },
    {
        path: '/user/:id/edit',
        component: editUser,
        props: true
    },
    {
        path: '/:pathMatch(.*)*',
        component: notFound
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL), routes
})
export default router
