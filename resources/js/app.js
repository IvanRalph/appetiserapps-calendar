require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Events from './components/Events';
import App from './components/App';
import {BootstrapVue, IconsPlugin} from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Events
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
