/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.instance = require('./http')
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'

import auth from './auth'
import router from './router'
import appEvent from './core/AppEvent'
import vSelect from 'vue-select'

import VueToastr2 from 'vue-toastr-2'
import 'vue-toastr-2/dist/vue-toastr-2.min.css'
window.toastr = require('toastr')


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('top-bar', require('./components/menus/TopBar.vue').default)
Vue.component('side-bar', require('./components/menus/SideBar.vue').default)
Vue.component('app', require('./pages/App.vue').default)

Vue.component('v-select', vSelect)
Vue.use(VueToastr2)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.router = router
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)
const app = new Vue({
    el: '#app',
   router: router
});
