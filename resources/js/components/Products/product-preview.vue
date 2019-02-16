<template>

    <div class="single-product shop-quick-view-ajax clearfix modal2__content">

        <div class="ajax-modal-title d-flex justify-content-between">
            <h2>{{selectedProduct.name}}</h2>
           <span id="single_product_close" @click.prevent="closeProduct()">&times</span>
        </div>

        <div class="product modal-padding clearfix">

            <div class="col_half nobottommargin">
                <div class="product-image">
                    <div class="fslider" data-pagi="false">
                        <div class="flexslider">
                            <div class="slider-wrap">
                                <div class="slide"><a href="https://via.placeholder.com/270x360.png?text=product" title="Pink Printed Dress - Front View"><img src="https://via.placeholder.com/270x360.png?text=product" alt="Pink Printed Dress"></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="sale-flash">Sale!</div>
                </div>
            </div>
            <div class="col_half nobottommargin col_last product-desc">
                <div class="product-price"><del>$39.99</del> <ins>$24.99</ins></div>
                <div class="product-rating">
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star3"></i>
                    <i class="icon-star-half-full"></i>
                    <i class="icon-star-empty"></i>
                </div>
                <div class="clear"></div>
                <div class="line"></div>

                <!-- Product Single - Quantity & Cart Button
                ============================================= -->
                <form class="cart nobottommargin clearfix" method="post" enctype='multipart/form-data'>
                    <div class="quantity clearfix">
                        <input type="button" value="-" class="minus">
                        <input type="text" step="1" min="1"  name="quantity" value="1" title="Qty" class="qty" size="4" />
                        <input type="button" value="+" class="plus">
                    </div>
                    <button type="submit" class="add-to-cart button nomargin">Add to cart</button>
                </form><!-- Product Single - Quantity & Cart Button End -->

                <div class="clear"></div>
                <div class="line"></div>
                <p>Libero velit id eaque ex quae laboriosam nulla optio doloribus! Perspiciatis, libero, neque, perferendis at nisi optio dolor!</p>
                <ul class="iconlist">
                    <li><i class="icon-caret-right"></i> Dynamic Color Options</li>
                    <li><i class="icon-caret-right"></i> Lots of Size Options</li>
                    <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
                </ul>
                <div class="card product-meta nobottommargin">
                    <div class="card-body">
                        <span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">8465415</span></span>
                        <span class="posted_in">Category: <a href="http://localhost/offbeat/wp/product-category/shoes/" rel="tag">Shoes</a>.</span>
                        <span class="tagged_as">Tags: <a href="http://dante.swiftideas.net/product-tag/barena/" rel="tag">Barena</a>, <a href="http://dante.swiftideas.net/product-tag/blazers/" rel="tag">Blazers</a>, <a href="http://dante.swiftideas.net/product-tag/tailoring/" rel="tag">Tailoring</a>, <a href="http://dante.swiftideas.net/product-tag/unconstructed/" rel="tag">Unconstructed</a>.</span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        name: "product-preview",
        props:['selectedProduct'],
        methods:{
            closeProduct(){
                this.$emit('singleProduct:close')
            }
        }
    }

</script>

<style >
    .modal2 {
        display: none;
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 999;
        background-color:rgba(0, 0, 0, 0.5);
    }
    .modal2.open {
        display: flex;
        flex-direction: column;
    }
    .modal2__header,
    .modal2__footer {
        height: 100px;
    }
    .modal2__content {
        height: 80%;
        overflow-y: auto;
        top: 10%;
    }
    #single_product_close {
        font-size: 25px;
        cursor: pointer;
    }
    @media (max-width: 992px) {
        #header {
            position: relative;
            /*z-index: 99;*/
        }
    }
</style>