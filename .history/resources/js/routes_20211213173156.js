import Vue from 'vue';
import VueRouter from 'vue-router';

import Dashboard from './components/contents/Dashboard';
import Example from './components/contents/Example';
// USER MANAGEMENT
import Users from './components/contents/Users';
import UsersCreate from './components/contents/subcontents/UsersCreate';
import UsersEdit from "./components/contents/subcontents/UsersEdit";

Vue.use(VueRouter);

const routes = [
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard,
        params: {}
    },
    {
        path: '/pages/example',
        name: 'Example',
        component: Example,
        params: {}
    },
    // USER MANAGEMENT
    {
        path: '/pages/users',
        name: 'Users',
        component: Users,
        params: {}
    },
    {
        path: '/pages/users/create',
        name: 'UserCreate',
        component: UsersCreate,
        params: {}
    },
    {
        path: '/pages/users/edit',
        name: 'UsersEdit',
        component: UsersEdit,
        params: {}
    }
    // END USER MANAGEMENT
];

const router = new VueRouter({
    routes: routes,
    mode: 'history'
})

// Set Dashboard as default first page
// router.replace("/dashboard");
// router.replace("/pages/user_management");

export default router;
