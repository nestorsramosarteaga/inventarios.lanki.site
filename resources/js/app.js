require('./bootstrap');
import vue from 'vue';
window.Vue = vue;

import App from './components/App.vue';

// import axios
import VueAxios from 'vue-axios';
import axios from 'axios';
import config from './components/config';
//importar y configurar vue-rouer
import VueRouter from 'vue-router';
import { routes } from './routes';
import Vue from 'vue';

axios.defaults.baseURL = `${config.apiUrl}`;
console.log(`${config.apiUrl}`)

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
const router = new VueRouter({
    mode:'history',
    routes: routes,
});

const app = new Vue({
    el: '#app',
    router:router,
    render: h => h(App)
});