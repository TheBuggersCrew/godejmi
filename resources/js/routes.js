import VueRouter from "vue-router";
import Index from "./components/Index";
import Quiz from "./components/Quiz"

const routes = [
    {
        path: "/",
        component: Index,
        name: "index"
    },
    {
        path: "/quiz",
        component: Quiz,
        name: "quiz"
    },
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
