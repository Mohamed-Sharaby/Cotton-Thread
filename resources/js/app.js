require('./bootstrap');

require('alpinejs');

window.Vue = require('vue');
/***
 *  vue router
 */
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import {routes} from './routes/site.js';
const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
});

/***
 *  vuex
 */
import Vuex from 'vuex';
Vue.use(Vuex);
import siteData from './store/site_data';
const store = new Vuex.Store(siteData);

const app = new Vue({
    router,
    store,
    el: '#app',
});