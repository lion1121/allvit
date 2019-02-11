
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/addPromocodeComponent.vue -> <example-component></example-component>
 */

// Vue.component('example-component', require('./custom_voyager/Promocode/addPromocodeComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('sidebar', require('./components/Products/sidebar.vue'));
Vue.component('products', require('./components/Products/products.vue'));
import sidebar from "./components/Products/sidebar.vue"
import products from "./components/Products/products.vue"
import axios from 'axios';

const app = new Vue({
    el: '#shop',
    data: {
      products: {},
      sidebarFilters: {}
    },
    components:{
        'sidebar':sidebar,
        'products':  products
    },

    mounted(){
        let url = window.location.href;
        console.log(url);
        axios.get('/catalog/pitanie').then(response => {
            console.log(response);
            this.products = response.data.listing.data;
            this.sidebarFilters = response.data.sidebar
        }).catch(() => console.warn('Something went wrong.'));
    }
});
