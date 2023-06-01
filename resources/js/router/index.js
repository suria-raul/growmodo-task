import {createRouter, createWebHistory} from "vue-router";
import users from "../components/users/index.vue";
import notFound from "../components/notfound.vue";

const routes = [
    {
        path: '/user',
        component: users
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
