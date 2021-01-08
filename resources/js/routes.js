import VueRouter from "vue-router";
import EnterWindow from "./components/quiz/EnterWindow";
import Quiz from "./components/quiz/Quiz";
import HomePage from './components/homepage/HomePage'

const routes = [
    {
        path: "/",
        component: EnterWindow,
        name: "enterwindow"
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
