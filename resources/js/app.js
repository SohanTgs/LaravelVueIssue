import Vue from 'vue';
import routes from './router/index';


import { HasError, AlertError } from 'vform';  //Error Show validation message
Vue.component(HasError.name, HasError);  //Error Show validation message
Vue.component(AlertError.name, AlertError); //Error Show validation message


import CxltToastr from 'cxlt-vue2-toastr'; // Toaster
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css'; // Toaster
Vue.use(CxltToastr); // Toaster

var toastrConfigs = { 		// Toaster
    position: 'top right',  // Toaster
    showDuration: 2000,      // Toaster
    timeOut: 5000,      // Toaster
    closeButton: true,      // Toaster
    showMethod: 'fadeIn',      // Toaster
    hideMethod: 'fadeOut'      // Toaster
}  
Vue.use(CxltToastr, toastrConfigs)  // Toaster

require('./bootstrap');
// window.Vue = require('vue').default;

Vue.component('app-header', require('./components/header.vue').default);

const app = new Vue({
    el: '#app',
    router: routes
});
