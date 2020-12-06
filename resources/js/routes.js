import VueRouter from "vue-router";
import Index from "./components/Index";
import Quiz from "./components/quiz/Quiz";
import HomePage from './components/homepage/HomePage'

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
        path: '/homepage',
        component: HomePage,
        name: 'homepage',
    },
];

const router = new VueRouter({
    routes,
    mode: "history"
});

export default router;
