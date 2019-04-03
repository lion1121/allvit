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
const products = require('./components/Products/products.vue');
const Cart = require('./components/Cart/cart.vue');

const routes = [
    {
        path: '/catalog/:param?/:param2?/:param3/',
        name: 'product.index',
        component: ProductIndex
    },

];
const router = new VueRouter({
    mode: 'history',
    routes
});


import Vuex from 'vuex';
import Axios from 'axios';
import {mapState} from 'vuex';

require('vue-flash-message/src/FlashMessage.css');

import VueFlashMessage from 'vue-flash-message';

Vue.use(VueFlashMessage, {
    messageOptions: {
        timeout: 3000,
    },
});

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        products: [],
        userId: null,
    },

    getters: {
        productsQuantity: state => {
            let quantity = 0;
            state.products.map(function (item) {
                quantity += parseInt(item.quantity);
            });
            return quantity;
        },
        cartTotalPrice: state => {
            let summ = 0;
            state.products.map(function (item) {
                summ += item.total;
            });
            return summ;
        }
    },

    mutations: {
        SET_PRODUCTS(state, data) {
            state.userId = data.user_id;
            state.products = data.products;
        },
        SET_PRODUCTS_LS(state, data) {
            state.products = data;
            let tempTotal = state.products.map(function (item) {
                let summ = 0;
                summ = summ + item.total;
                return summ;
            });
            state.cartSumm = tempTotal.reduce(function (sum, item) {
                return sum + item;
            })
        },
        ADD_PRODUCT_TO_LS(state, data) {
            state.products = data
        },
        ADD_PRODUCT_TO_CART(state, data) {
            state.products.push(data);
        },
        REMOVE_PRODUCT_FROM_DB(state, data) {
            let products = state.products;
            const removeIndex = products.map(function (item) {
                return item.id;
            }).indexOf(data.id);
            products.splice(removeIndex, 1);
        },
        REMOVE_PRODUCT_FROM_LS(state, data) {
            state.products = data;
        },
        SET_USER_STATUS(state, data) {
            state.userId = data;
        },
        UPDATE_PRODUCT_DB(state, data) {
            let products = state.products;
            products.map(function (item) {
                if (item.id === data.product.id) {
                    item.quantity = data.quantity;
                    item.total = data.quantity * item.price;
                }
            })
        },
        UPDATE_PRODUCT_LS(state, data) {
            let products = state.products;
            products.map(function (item) {
                if (item.id === data.product.id) {
                    item.quantity = data.quantity;
                    item.total = data.quantity * item.price;
                }
            });
        }
    },

    actions: {
        init({commit}) {
            axios.get('/api/cart/user').then((res) => {
                commit('SET_USER_STATUS', res.data);
                if (res.data !== null) {
                    axios.get('/api/cart/products').then((res) => {
                        if (res.data !== null) {
                            commit('SET_PRODUCTS', res.data);
                        }
                    })
                } else {
                    commit('SET_PRODUCTS_LS', JSON.parse(localStorage.cart));
                }
            })
        },
        addProductToLs({commit}, payload) {
            commit('ADD_PRODUCT_TO_LS', JSON.parse(payload))
        },
        async addProductToDb({commit, dispatch}, payload) {
            let total = 0;
            total = payload.product.price * payload.quantity;
            return await axios.post('/api/cart/addProduct', {
                product: payload.product,
                quantity: payload.quantity,
                total: total,
            }).then((res) => {
                commit('ADD_PRODUCT_TO_CART', res.data)
            }).catch(e => {
                console.log(e);
            });
        },
        async updateQuantityProductDb({commit, dispatch}, payload) {
            return await axios.put('/api/cart/updateProduct', {
                product: payload.product,
                quantity: payload.quantity,
            }).then((res) => {
                commit('UPDATE_PRODUCT_DB', payload)
            }).catch(e => {
                console.log(e);
            });
        },
        async updateQuantityProductLs({commit, dispatch}, payload) {
            commit('UPDATE_PRODUCT_LS', payload)
        },
        async removeProductFromDb({commit, dispatch}, payload) {
            return await axios.post('/api/cart/removeProduct', {
                product: payload.product,
            }).then((res) => {
                commit('REMOVE_PRODUCT_FROM_DB', res.data)
            }).catch(e => {
                console.log(e);
            });
        },
        async removeProductFromLs({commit}, payload) {
            commit('REMOVE_PRODUCT_FROM_LS', payload)
        }
    },
});


const app = new Vue({
    el: '#app',
    data() {
        return {
            emptyLS: [],
        }
    },
    mounted() {
        if (!localStorage.cart) {
            localStorage.cart = JSON.stringify(this.emptyLS);
        }
        this.$store.dispatch('init');
    },
    computed: {
        ...mapState([
            'products',
            'userId',
        ])
    },
    store,
    router,
    components: {
        products
    }
});
