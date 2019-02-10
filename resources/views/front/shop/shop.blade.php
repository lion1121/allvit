@extends('layouts.app')

@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{$category->name}}</h1>
            <span>интернет-магазин спортивного питания в Украине</span>
            @include('front.elements.breadcrumbs',[$category,$category])
        </div>

    </section><!-- #page-title end -->

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix" id="shop">

                {{--<!-- Post Content--}}
                {{--============================================= -->--}}
                {{--<div class="postcontent nobottommargin col_last" id="productsWrapper">--}}
                    {{--<!-- Shop--}}
                    {{--============================================= -->--}}
                {{--@include('front.shop.ajax.products-ajax',['productsPag' => $productsPag])--}}
                {{--<!-- #shop end -->--}}

                {{--</div><!-- .postcontent end -->--}}

                {{--<!-- Sidebar--}}
                {{--============================================= -->--}}
                {{--<div class="sidebar nobottommargin">--}}
                    {{--@include('front.shop.ajax.sidebar-ajax',['vendors' => $vendors, 'allIngredients' => $allIngredients, 'allGoals' => $allGoals, 'tastes' => $tastes, 'colors' => $colors])--}}
                {{--<!-- .sidebar end -->--}}
                {{--</div>--}}
                <products :products="products"></products>
                <sidebar :filters="filters"></sidebar>
            </div>

        </div>

    </section><!-- #content end -->
@endsection
<script>
    import Products from "../../../js/components/Products/products";
    export default {
        components: {Products}
    }
</script>
<script>
    import Sidebar from "../../../js/components/Products/sidebar";
    export default {
        components: {Sidebar}
    }
</script>