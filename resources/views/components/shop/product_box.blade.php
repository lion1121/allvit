<div class="product clearfix">
    <div class="product-image">
        @if($product->img)
            <a href="#"><img src="images/shop/dress/1.jpg"
                             alt="Checked Short Dress"></a>
            <a href="#"><img src="images/shop/dress/1-1.jpg"
                             alt="Checked Short Dress"></a>
        @else
            <a href="#"><img
                        src="https://via.placeholder.com/270x360.png?text=product"
                        alt="Checked Short Dress"></a>
        @endif
        @if($product->discount_price > 0)
            <div class="sale-flash">50% Off*</div>
        @endif
        <div class="product-overlay">
            <a href="#" class="add-to-cart"><i
                        class="icon-shopping-cart"></i><span> Купить</span></a>
            <a href="include/ajax/shop-item.html" class="item-quick-view"
               data-lightbox="ajax"><i
                        class="icon-zoom-in2"></i><span> Посмотреть</span></a>
        </div>
    </div>
    <div class="product-desc">
        <div class="product-title"><h3><a href="#">{{$product->name}}</a>
            </h3>
        </div>
        <div class="product-price">
            <del>$24.99</del>
            <ins>{{$product->rice}}</ins>
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