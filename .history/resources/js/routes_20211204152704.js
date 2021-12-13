import Vue from 'vue';
import VueRouter from 'vue-router';

import Dashboard from './components/contents/Dashboard';
import Example from './components/contents/Example';
// USER MANAGEMENT
import UserManagement from './components/contents/UserManagement';
import UserManagementCreate from './components/contents/subcontents/UserManagementCreate';
import UserManagementEdit from "./components/contents/subcontents/UserManagementEdit";

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
        path: '/pages/user_management',
        name: 'UserManagement',
        component: UserManagement,
        params: {}
    },
    {
        path: '/pages/user_management/create',
        name: 'UserManagementCreate',
        component: UserManagementCreate,
        params: {}
    },
    {
        path: '/pages/user_management/edit',
        name: 'UserManagementEdit',
        component: UserManagementEdit,
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
