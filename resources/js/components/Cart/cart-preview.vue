<template>
    <div id="top-cart">
        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>{{products.length}}</span></a>
        <div class="top-cart-content">
            <div class="top-cart-title">
                <h4>Shopping Cart</h4>
            </div>
            <div class="top-cart-items">
                <div class="top-cart-item clearfix" v-for="product in products">
                    <div class="top-cart-item-image">
                        <a href="#"><img src="https://via.placeholder.com/64"
                                         alt="Blue Round-Neck Tshirt"/></a>
                    </div>
                    <div class="top-cart-item-desc">
                        <a href="#">{{product.name}}</a>
                        <span class="top-cart-item-price">$ {{product.price}}</span>
                        <span class="top-cart-item-quantity">x 2</span>
                    </div>
                </div>

            </div>
            <div class="top-cart-action clearfix">
                <span class="fleft top-checkout-price">$114.95</span>
                <button class="button button-3d button-small nomargin fright">View Cart</button>
            </div>
        </div>
    </div><!-- #top-cart end -->
</template>



<script>
    // import {store} from "/resources/js/store.js"
    export default {
        name: "cart-preview",
        created(){
            this.$root.$on('cartProducts', (products) => {
                this.products = products;
                return this.products;
            })
        },
        data() {
            return {
                // test: store.state,
                products: JSON.parse(localStorage.cart),
                rer:0
            }
        },
        methods: {
        },

    }
</script>

<style scoped>

</style>