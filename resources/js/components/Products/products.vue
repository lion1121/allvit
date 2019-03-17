<template>
    <div>
        <div id="shop1" class="shop1 product-3 grid-container1 clearfix" data-layout="fitRows">
            <div class="product clearfix" v-for="product in products">
                <div class="product-image">
                    <!--@if($product->img)-->

                    <!--@else-->
                    <a href="#" @click.prevent="showProduct(product)"><img
                            src="https://via.placeholder.com/270x360.png?text=product"
                            alt="Checked Short Dress"></a>
                    <!--@endif-->
                    <!--@if($product->discount_price > 0)-->
                    <div class="sale-flash">50% Off*</div>
                    <!--@endif-->
                    <div class="product-overlay">
                        <a href="#" class="add-to-cart" @click.prevent="addToCart(product)">
                            <i class="icon-shopping-cart" ></i><span> Купить</span></a>
                        <a href="#" class="item-quick-view" @click.prevent="showProduct(product)"><i
                                class="icon-zoom-in2"></i><span> Посмотреть</span></a>
                    </div>
                </div>
                <div class="product-desc">
                    <div class="product-title"><h3>
                        <a v-bind:href="meta.path.split('api')[0] + 'catalog/' + product.prod_cat_url + '/' + product.slug">{{product.name}}</a>
                    </h3>
                    </div>
                    <div class="product-price">
                        <del>$24.99</del>
                        <span>{{product.price}}</span>
                    </div>
                    <div class="product-rating">
                        <i class="icon-star3"></i>
                        <i class="icon-star3"></i>
                        <i class="icon-star3"></i>
                        <i class="icon-star3"></i>
                        <i class="icon-star-half-full"></i>
                    </div>
                </div>
            </div>
        </div>
        <div :class="{open : preview}" class="modal2">
            <product-preview :selectedProduct="selectedProduct" v-if="preview" v-on:singleProduct:close="closeProduct()"></product-preview>
        </div>
        <div>
            <flash-message transitionName="flash" class="flashpool"></flash-message>
        </div>
    </div>
</template>

<script>
    import productPreview from "./product-preview.vue"
    export const bus = new Vue();

    export default {
        name: "products",
        data() {
            return {
                preview: false,
                selectedProduct:{},
            }
        },
        components: {
            'product-preview': productPreview,
        },
        props: ['products', 'meta'],
        methods:{
            showProduct(product){
                this.preview = true;
                this.selectedProduct = product;
            },
            closeProduct(){
                this.preview = false;
            },
            addToCart(product){
                this.flash(`Товар ${product.name} добавлен в корзину.`, 'info');
                if(this.$store.state.userId === null){
                    let cartProductsStorage = JSON.parse(localStorage.cart);
                    cartProductsStorage.push(product);
                    localStorage.cart =  JSON.stringify(cartProductsStorage);
                    this.$store.dispatch('addProductToLs', localStorage.cart);
                } else {
                    this.$store.dispatch('addProductToDb', {product:product.id,quantity:1});
                }
            }
        }

    }
</script>

<style scoped>
    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .flashpool {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        position: fixed;
        top: 20px;
        right: 20px;
        max-height: 400px;
        width: 260px;
        -webkit-perspective: 400px;
        perspective: 400px;
        z-index: 99999;
    }
    .flashpool .flash__message {
        width: 260px;
        -webkit-transition: all 500ms;
        -o-transition: all 500ms;
        transition: all 500ms;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-family: 'Oxygen', sans-serif;
        font-size: 13px;
        line-height: 130%;
    }
    .flash-enter, .flash-leave-to {
        opacity: 0;
        -webkit-transform: rotateX(-30deg) scale(.88) translateY(-30px);
        transform: rotateX(-30deg) scale(.88) translateY(-30px);
    }
    .flash-leave-active {
        position: absolute;
    }
    .cpanel {
        font-family: 'Oxygen', sans-serif;
        position: fixed;
        top: 0;
        left: 0;
        width: 250px;
        height: 100vh;
        padding: 40px 24px 0 24px;
        overflow: auto;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        border-right: 1px solid rgb(235, 234, 234);
    }
    .cpanel__wrapper {
        height: 100%;
        padding-bottom: 24px;
    }
    .cpanel__donate {
        -ms-flex-negative: 0;
        flex-shrink: 0;
        padding-bottom: 24px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        opacity: .3;
    }
    .cpanel__donate:hover {
        opacity: 1;
    }
    .cpanel__group {
        font-size: 13px;
        margin: 0 10px 31px 0;
    }
    .cpanel__input {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: none;
        font-size: 18px;
        padding: 0 0 6px 0;
        border-bottom: 2px solid #ddd;
        width: 100%;
    }
    .cpanel__checkbox {
        margin-right: 3px;
        margin-bottom: 5px;
    }
    .cpanel input:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none;
        border-bottom: 2px solid #47B784;
    }
    .cpanel button {
        width: 100%;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border: 1px solid #47B784;
        color: #47B784;
        font-weight: normal;
        padding: 10px;
        border-radius: 3px;
        cursor: pointer;
    }
    .cpanel button:focus, .cpanel button:active {
        outline: none;
    }
    .cpanel button:active {
        background-color: rgb(225, 241, 234);
    }
    .cpanel button.cpanel__reset {
        width: 100%;
        border-color: transparent;
        font-size: 13px;
        color: #47B784;
        padding: 0;
        margin-top: 16px;
        border-radius: 0;
        cursor: pointer;
    }
    .cpanel__label, .cpanel__hint {
        display: block;
        margin-bottom: 5px;
        color: #7f8c8d;
        font-size: 0.85em;
    }
    .cpanel__label {
        cursor: pointer;
    }
    .cpanel__hint {
        margin-top: 5px;
        font-style: italic;
        color: #a1abac;
    }
</style>