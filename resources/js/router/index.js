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
        name: 'login',
        component: loginForm,
    },
    {
        path: '/register',
        name: 'register',
        component: registerForm
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: dashboard
    },
    {
        path: '/users',
        name: 'users',
        component: users
    },
    {
        path: '/users/create',
        name: 'users_create',
        component: createUser
    },
    {
        path: '/users/:id',
        name: 'users_show',
        component: showUser,
        props: true
    },
    {
        path: '/users/:id/edit',
        name: 'users_edit',
        component: editUser,
        props: true
    }
]

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL), routes
})

router.beforeEach((to, from, next) => {
    if (to.fullPath == '/dashboard' && localStorage.API_TOKEN == undefined) {
        next({name: 'login'})
    } else if (to.fullPath == '/users' && localStorage.API_TOKEN == undefined) {
        next({name: 'login'})
    } else if (to.fullPath == '/users/create' && localStorage.API_TOKEN == undefined) {
        next({name: 'login'})
    } else {
        next()
    }
})

export default router
