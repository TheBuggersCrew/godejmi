import VueRouter from "vue-router";
import Index from "./components/Index";
import Quiz from "./components/Quiz"
import Test from "./components/Test"

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
    {
        path: '/test',
        component: Test,
        name: 'test',
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
