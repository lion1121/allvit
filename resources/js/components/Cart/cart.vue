<template>
    <div class="container clearfix">
        <div class="table-responsive">
            <table class="table cart">
                <thead>
                <tr>
                    <th class="cart-product-remove">&nbsp;</th>
                    <th class="cart-product-thumbnail">&nbsp;</th>
                    <th class="cart-product-name">Товар</th>
                    <th class="cart-product-price">Цена за еденицу</th>
                    <th class="cart-product-quantity">Кол-во</th>
                    <th class="cart-product-subtotal">Всего</th>
                </tr>
                </thead>
                <tbody>
                <tr class="cart_item" v-for="product in products">
                    <td class="cart-product-remove">
                        <a href="#" class="remove" title="Удалить товар" @click.prevent="removeCartProduct(product)"><i
                                class="icon-trash2"></i></a>
                    </td>

                    <td class="cart-product-thumbnail">
                        <a href="#"><img width="64" height="64" src="https://via.placeholder.com/64"
                                         alt="Pink Printed Dress"></a>
                    </td>

                    <td class="cart-product-name">
                        <a v-bind:href="currentDomain + 'catalog/' + product.prod_cat_url + '/' + product.slug"
                           target="_blank">{{product.name}}</a>
                    </td>

                    <td class="cart-product-price">
                        <span class="amount">$ {{product.price}}</span>
                    </td>

                    <td class="cart-product-quantity">
                        <div class="quantity clearfix">
                            <input type="button" value="-" class="minus"
                                   @click="updateQuantity(product.quantity > 1 ? --product.quantity : 1 , product, '-')">
                            <input type="text" name="quantity" v-model="product.quantity"
                                   @blur="updateQuantity(product.quantity, product,'=')" class="qty"/>
                            <input type="button" value="+" class="plus"
                                   @click="updateQuantity(++product.quantity, product,'+')">
                        </div>
                    </td>

                    <td class="cart-product-subtotal">
                        <span class="amount">$ {{product.total}}</span>
                    </td>
                </tr>

                <tr class="cart_item">
                    <td colspan="6">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-4 nopadding">
                                <div class="row">
                                    <!--<div class="col-lg-8 col-7">-->
                                        <!--<input type="text" value="" class="sm-form-control"-->
                                               <!--placeholder="Введите код..."/>-->
                                    <!--</div>-->
                                    <!--<div class="col-lg-4 col-5">-->
                                        <!--<a href="#" class="button button-3d button-black nomargin">Использовать-->
                                            <!--купон</a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <div class="col-lg-8 col-8 nopadding">
                                <a href="#" class="button button-3d nomargin fright">Update Cart</a>
                                <a href="shop.html" class="button button-3d notopmargin fright">Proceed to Checkout</a>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>

            </table>
        </div>

        <div class="row clearfix">
            <div class="col-lg-6 clearfix">
                <!--<h4>Calculate Shipping</h4>-->

                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link " :class="{active:customerTab.isActive, show: customerTab.isShow}"
                               id="home-tab" data-toggle="tab" href="#home"
                               role="tab" aria-controls="home" aria-selected="true">Контактные данные <i
                                    class="tabs_icon" :class="{success_tabs_icon:customerTab.iconActive}">1</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                               :class="{disabled: deliveryTab.isDisabled,active: deliveryTab.isActive, show: deliveryTab.isShow}"
                               id="profile-tab"
                               data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
                               aria-selected="false">Доставка <i
                                    class="tabs_icon" :class="{success_tabs_icon:deliveryTab.iconActive}">2</i></a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade  pt-3"
                             :class="{active: customerTab.isActive, show: customerTab.isShow}" id="home" role="tabpanel"
                             aria-labelledby="home-tab">

                            <cart-customer-form @formValidated="toggleDeliverTab"></cart-customer-form>
                        </div>
                        <div class="tab-pane fade pt-3"
                             :class="{active: deliveryTab.isActive, show: deliveryTab.isShow}" id="profile"
                             role="tabpanel" aria-labelledby="profile-tab">

                            <cart-delivery></cart-delivery>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-6 clearfix">
                <h4>Сумма к оплате</h4>

                <div class="table-responsive">
                    <table class="table cart">
                        <tbody>
                        <tr class="cart_item">
                            <td class="cart-product-name">
                                <strong>Всего к оплате</strong>
                            </td>

                            <td class="cart-product-name">
                                <span class="amount">$106.94</span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td class="cart-product-name">
                                <strong>Доставка</strong>
                            </td>

                            <td class="cart-product-name">
                                <span class="amount">Free Delivery</span>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td class="cart-product-name">
                                <strong>Total</strong>
                            </td>

                            <td class="cart-product-name">
                                <span class="amount color lead"><strong>$ {{total}}</strong></span>
                            </td>
                        </tr>
                        </tbody>

                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-7">
                        <input type="text" value="" class="sm-form-control"
                               placeholder="Введите код..."/>
                    </div>
                    <div class="col-lg-4 col-5">
                        <a href="#" class="button button-3d button-black nomargin">Использовать
                            купон</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <flash-message transitionName="flash" class="flashpool"></flash-message>
        </div>
    </div>
</template>

<script>
    import customerFrom from './cart-customer-form.vue';
    import deliveryForm from './cart-delivery.vue';

    export default {
        name: "cart",
        mounted() {
            this.currentDomain = window.location.pathname.split('/')[0];
        },
        data() {
            return {
                coupon: '',
                currentDomain: '',
                value: 0,
                deliveryTab: {
                    isActive: false,
                    isDisabled: true,
                    isShow: false,
                    iconActive: false
                },
                customerTab: {
                    isActive: true,
                    isShow: true,
                    iconActive: true
                }
            }
        },
        created(){
          this.$on('formNonFiled',() => {
              console.log(22222);
              this.deliveryTab.isActive = false;
              this.deliveryTab.isDisabled = true;
              this.deliveryTab.isShow = false;
          })
        },
        computed: {
            products() {
                return this.$store.state.products;
            },
            total() {
                return this.$store.getters.cartTotalPrice;
            },
        },
        methods: {
            removeCartProduct(product) {
                this.flash(`Товар ${product.name} удален из корзины.`, 'info');
                if (this.$store.state.userId === null) {
                    let products = JSON.parse(localStorage.cart);
                    const removeIndex = products.map(function (item) {
                        return item.id;
                    }).indexOf(product.id);
                    products.splice(removeIndex, 1);
                    localStorage.cart = JSON.stringify(products);
                    this.$store.dispatch('removeProductFromLs', products);
                } else {
                    this.$store.dispatch('removeProductFromDb', {product: product});
                }
            },
            updateQuantity(value, product, operator = null) {
                if (this.$store.state.userId === null) {
                    let products = JSON.parse(localStorage.cart);
                    if (value >= 1) {

                        switch (operator !== null) {
                            case operator === '+':
                                this.flash(`Добавлена 1 позиция ${product.name}.`, 'info');
                                break;
                            case operator === '-':
                                this.flash(`Удалена 1 позиция ${product.name}.`, 'info');
                                break;
                            case operator === '=':
                                this.flash(`Колличество товара ${product.name}. изменено на ${value}`, 'info')
                        }

                        let updatedProducts = products.map(function (item) {
                            if (item.hasOwnProperty('id') && item.id === product.id) {
                                item.quantity = value;
                                item.total = item.price * value;
                            }
                            return item;
                        });
                        localStorage.cart = JSON.stringify(updatedProducts);
                        this.$store.dispatch('updateQuantityProductLs', {product: product, quantity: value});
                    }
                } else {
                    if (value >= 1) {
                        switch (operator !== null) {
                            case operator === '+':
                                this.flash(`Добавлена 1 позиция ${product.name}.`, 'info');
                                break;
                            case operator === '-':
                                this.flash(`Удалена 1 позиция ${product.name}.`, 'info');
                                break;
                            case operator === '=':
                                this.flash(`Колличество товара ${product.name}. изменено на ${value}`, 'info')
                        }
                    }
                    this.$store.dispatch('updateQuantityProductDb', {product: product, quantity: value});
                }
            },
            toggleDeliverTab() {
                this.deliveryTab.isActive = true;
                this.deliveryTab.isDisabled = false;
                this.deliveryTab.isShow = true;
                this.deliveryTab.iconActive = true;
                this.customerTab.isActive = false;
                this.customerTab.isShow = false;
            }
        },
        components: {
            'cart-customer-form': customerFrom,
            'cart-delivery': deliveryForm
        }

    }
</script>

<style scoped>
    .tabs_icon {
        background: #9F9F9F;
        width: 20px;
        height: 20px;
        display: inline-block;
        text-align: center;
        border-radius: 50%;
        font-size: 14px;
        color: #fff;
    }

    .success_tabs_icon {
        background: #0E4984 !important;
    }
</style>