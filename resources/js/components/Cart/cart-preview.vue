<template>

    <div id="top-cart">
        <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span>{{ count}}</span></a>
        <div class="top-cart-content">
            <div class="top-cart-title">
                <h4>Корзина</h4>
            </div>
            <div class="top-cart-items">
                <div class="top-cart-item clearfix" v-for="product in products" v-if="!userId">
                    <div class="top-cart-item-image">
                        <a href="#"><img src="https://via.placeholder.com/64"
                                         alt="Blue Round-Neck Tshirt"/></a>
                    </div>
                    <div class="top-cart-item-desc">
                        <a href="#">{{product.name}}</a>
                        <span class="top-cart-item-price">$ {{product.price}}</span>
                        <span class="top-cart-item-quantity">x {{product.quantity}}</span>
                    </div>
                </div>
                <div class="top-cart-item clearfix" v-for="product in products" v-if="userId">
                    <div class="top-cart-item-image">
                        <a href="#"><img src="https://via.placeholder.com/64"
                                         alt="Blue Round-Neck Tshirt"/></a>
                    </div>
                    <div class="top-cart-item-desc">
                        <a href="#">{{product.product_name}}</a>
                        <span class="top-cart-item-price">$ {{product.product_price}}</span>
                        <span class="top-cart-item-quantity">x 2</span>
                    </div>
                </div>

            </div>
            <div class="top-cart-action clearfix">
                <span class="fleft top-checkout-price">$ {{total}}</span>
                <a class="button button-3d button-small nomargin  " href="/cart">View Cart</a>

            </div>
        </div>
    </div><!-- #top-cart end -->
</template>


<script>
    import {mapState} from 'vuex';

    export default {
        name: "cart-preview",
        computed: {
            userId() {
                return this.$store.state.userId
            },
            count() {
                return parseInt(this.$store.getters.productsQuantity) || 0
            },
            products() {
                return this.$store.state.products || 0
            },
            total() {
                return this.$store.getters.cartTotalPrice;
            }
        },

    }
</script>

<style scoped>

</style>