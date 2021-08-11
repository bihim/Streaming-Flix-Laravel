import Dashboard from '../Pages/Dashboard.vue'
import Projects from '../Pages/Projects.vue'
import Team from '../Pages/Team.vue'


const routes = [
    {
        path: "",
        component: Dashboard,
        name: "dashboard",
    },
    {
        path: "projects",
        component: Projects,
        name: "projects",
    },
    {
        path: "team",
        component: Team,
        name: "team",
    },
];

export default routes;
