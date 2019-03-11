@extends('layouts.app')

@section('content')
    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Корзина</h1>
            <span>Start Buying your Favourite Theme</span>
            {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
            {{--<li class="breadcrumb-item active" aria-current="page">Shop</li>--}}
            {{--</ol>--}}
{{--            {{ Breadcrumbs::render('product', $product) }}--}}
        </div>

    </section><!-- #page-title end -->

    <section id="content">
<div class="content-wrap">



        <cart></cart>




</div>

@endsection