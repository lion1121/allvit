
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

import VueRouter from 'vue-router'
Vue.use(VueRouter);

import sidebar from "./components/Products/sidebar.vue"
import products from "./components/Products/products.vue"
import axios from 'axios';


const ProductIndex = require('./components/Products/ProductIndex.vue');
const routes = [
    {
        path:'/catalog/:param?/:param2?/:param3/',
        name: 'product.index',
        component: ProductIndex
    }
];
const router = new VueRouter({
    mode:'history',
    routes
});

const app = new Vue({
    el: '#shop1',
    router,
    data: {
      products: {},
      filters: {},
      paginateData:{
          currentPage:0,
          firstPage:'',
          from:0,
          lastPage:0,
          lastPageUrl:'',
          path:'',
          perPage:0,
          prevPageUrl:'',
          to:0,
          total:0
      }
    },
    components:{
        'sidebar':sidebar,
        'products':  products
    },

    mounted(){
        axios.get('/api' + this.$route.path).then(response => {
            console.log(response);
            this.products = response.data.listing.data;
            this.paginateData = response.data.listing;
            this.filters = response.data.sidebar;
            console.log(this.paginateData);
        }).catch(() => console.warn('Something went wrong.'));
    }
});
