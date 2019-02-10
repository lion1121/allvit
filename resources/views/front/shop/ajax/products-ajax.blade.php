<div id="shop" class="shop product-3 grid-container clearfix" data-layout="fitRows">
    @if(count($productsPag) > 0)
        @foreach($productsPag as $product)
            @include('front.shop.elements.product_box',[$product,$product])
        @endforeach
    @else
        <div class="alert-info">
            Продукты по данному критерию отсутствуют.
        </div>
    @endif
</div>
<div class="row mt-5">
    {{ $productsPag->links() }}
</div>