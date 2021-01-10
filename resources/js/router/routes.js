import EnterWindow from "../components/Quiz/EnterWindow";
import Quiz from "../components/Quiz/Quiz";
import HomePage from '../components/Homepage/HomePage'
import NameRandomiser from "../components/NameRandomiser/NameRandomiser"

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
    {
        path: "name-randomiser",
        component: NameRandomiser,
        name: "name-randomiser"
    }
]

export default routes