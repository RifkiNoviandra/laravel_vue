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

const App = createApp({
    // render: () => h(Home)
});


const routes = [
    {
        path: '/', component: template_HF, children: [
            {path: '/', component: Home},
            {path: '/detail/:id', component: detail_page},
            {path: '/search/:key', component: search},
        ],
        meta: {requiresToken: true},
    },
    {path: '/login/:id?', component: login},
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

