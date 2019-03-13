
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

Vue.component('product-index', require('./components/Products/ProductIndex.vue'));
Vue.component('sidebar', require('./components/Products/sidebar.vue'));
Vue.component('products', require('./components/Products/products.vue'));
Vue.component('product-preview', require('./components/Products/product-preview.vue'));
Vue.component('pagination', require('./components/Products/pagination.vue'));
Vue.component('cart', require('./components/Cart/cart.vue'));
Vue.component('cart-preview', require('./components/Cart/cart-preview.vue'));

import VueRouter from 'vue-router'
Vue.use(VueRouter);

const ProductIndex = require('./components/Products/ProductIndex.vue');
const Cart = require('./components/Cart/cart.vue');

const routes = [
    {
        path:'/catalog/:param?/:param2?/:param3/',
        name: 'product.index',
        component: ProductIndex
    },

];
const router = new VueRouter({
    mode:'history',
    routes
});


import Vuex from 'vuex';
import Axios from 'axios';
import {mapState} from 'vuex';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        products: null,
        userId: false
    },

    getters: {

    },

    mutations: {
        SET_PRODUCTS(state, data) {
            // state.products = products;
            // this.$store.state.userId = userId;
            state.userId = data.user_id;
            state.products = data.products;
            // state.producs = {...state.producs, producs:data.producs};
        }
    },

    actions: {
        loadDbData ({commit}){
          axios.get('/api/cart/products').then((res)=> {
              if(res.data !== null) {
                  commit('SET_PRODUCTS', res.data);
              }
          })
        },
    },
});


const app = new Vue({
    el: '#app',
    mounted(){
        this.$store.dispatch('loadDbData')
    },
    created(){

    },
    computed: {
      ...mapState([
          'products',
          'userId'
      ])
    },
    store,
    router,


});
