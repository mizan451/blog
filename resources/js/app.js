require('./bootstrap');
window.Vue = require('vue');

//Editor  Support
import VueMarkdownEditor from '@kangc/v-md-editor';
import '@kangc/v-md-editor/lib/style/base-editor.css';
import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js';

VueMarkdownEditor.use(vuepressTheme);

Vue.use(VueMarkdownEditor);

//Support vuex
import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
  storeData
)



//vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes'

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/PublicMaster.vue').default);


//v-form
import { Form, HasError, AlertError } from 'vform'
 
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)


// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
import {filter} from './filter'

const router = new VueRouter({
    routes,
    mode:'hash',

     
  })

const app = new Vue({
    el: '#app',
    router,
    store,
});



