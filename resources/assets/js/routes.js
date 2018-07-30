import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './components/HomeComponent'
import LoginComponent from './components/Auth/LoginComponent'
import LogoutComponent from './components/Auth/LogoutComponent'
import RegisterComponent from './components/Auth/RegisterComponent'
import NotFoundComponent from './components/NotFoundComponent'
import MyProfileComponent from './components/MyProfileComponent'

const routes = [
    {
        path: '/',
        name: 'home',
        component: HomeComponent,
    },
    {
        path: '/login',
        name: 'login',
        component: LoginComponent,
    },
    {
        path: '/logout',
        name: 'logout',
        component: LogoutComponent
    },
    {
        path: '/register',
        name: 'register',
        component: RegisterComponent,
    },
    {
      path: '/profile',
      name: 'profile',
      component: MyProfileComponent
    },
    {
        path: '/404',
        name: '404',
        component: NotFoundComponent,
    }, {
        path: '*',
        redirect: '/404'
    }
];

// const router = new VueRouter({
//    routes
// });

const router = new VueRouter({
    mode: 'history',
    routes
});
// router.mode = 'html5'

export default router;