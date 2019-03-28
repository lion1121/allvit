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
                            <i class="icon-shopping-cart"></i><span> Купить</span></a>
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
            <product-preview :selectedProduct="selectedProduct" v-if="preview"
                             v-on:singleProduct:close="closeProduct()"></product-preview>
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
                selectedProduct: {},
            }
        },
        components: {
            'product-preview': productPreview,
        },
        props: ['products', 'meta'],
        methods: {
            showProduct(product) {
                this.preview = true;
                this.selectedProduct = product;
            },
            closeProduct() {
                this.preview = false;
            },
            addToCart(product) {
                this.flash(`Товар ${product.name} добавлен в корзину.`, 'info');
                if (this.$store.state.userId === null) {
                    let cartProductsStorage = JSON.parse(localStorage.cart);
                    // Set default quantity value
                    product.quantity = 1;
                    //Increase product quantity by 1
                    cartProductsStorage.map(function (item) {
                        if (item.id === product.id) {
                            item.quantity++;
                        }
                    });

                    let cartProductsStorageLength = cartProductsStorage.length;
                    //If LS is empty push product to LS
                    if (cartProductsStorageLength === 0) {
                        cartProductsStorage.push(product);
                    }
                    //Get all products ids from LS
                    let ids = [];
                    cartProductsStorage.map(function (item) {
                        if (item.id === product.id) {
                            ids.push(item.id);
                        }
                    });
                    //If product id doesn't exist in LS, add to LS
                    if (!_.includes(ids, product.id)) {
                        cartProductsStorage.push(product);
                    }
                    localStorage.cart = JSON.stringify(cartProductsStorage);
                    this.$store.dispatch('addProductToLs', localStorage.cart);
                } else {
                    this.$store.dispatch('addProductToDb', {product: product.id, quantity: 1});
                }
            }
        }
    }
</script>

<style scoped>

</style>