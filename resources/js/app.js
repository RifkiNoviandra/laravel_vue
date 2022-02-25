import login from './component/login';

require('./bootstrap');
const {createApp, h} = require('vue');
// const Home = require('./component/Home.vue');
const VueRouter = require('vue-router');
import Home from './component/Home';
import './bootstrap.bundle.min';
import dashboard_admin from './component/dashboard_admin';
import detail_page from './component/detail_page';
import template_HF from './component/template_HF';
import search from './component/search';
import template_home from './component/template_home';

const App = createApp({
    // render: () => h(Home)
});


const routes = [
    {
        path: '/landing', component: template_HF, children: [
            {path: '/landing', component: Home},
            {path: '/landing/detail/:id', component: detail_page},
            {path: '/landing/search/:key', component: search},
        ],
        meta: {requiresToken: true},
    },
    {
        path: '/home', component: template_home, children: [
            {path: '/home', component: Home},
            {path: '/home/detail/:id', component: detail_page},
            {path: '/home/search/:key', component: search},
        ],
        meta: {requiresToken: true},
    },
    {path: '/login/:id?', component: login},
    {path: '/', component: login},
    {path: '/token', component: login, meta: {requiresToken: true}},
    {path: '/admin/dashboard', component: dashboard_admin, meta: {requiresToken: true}},
];

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory(),
    routes,
});

router.beforeEach(async (to, from, next) => {
    let token = localStorage.getItem('token');
    if (to.meta.requiresToken) {
        if (!token) {
            return next('/login');
        }
        window.axios.defaults.params = {};
        window.axios.defaults.params['token'] = token;
    }
    return next();
});

App.use(router);

App.mount('#app');

