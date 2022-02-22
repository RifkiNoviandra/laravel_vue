require('./bootstrap');
const {createApp , h} = require('vue');
// const Home = require('./component/Home.vue');
const VueRouter = require('vue-router');
import Home from './component/Home';
import "./bootstrap.bundle.min";

const App = createApp({
    // render: () => h(Home)
})



const routes = [
    {path: '/' , component: Home},
    {path: '/landing' , component: Home}
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
})

App.use(router)

App.mount('#app');

