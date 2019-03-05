@extends('layouts.app')

@section('content')
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{$category->name}}</h1>
            <span>интернет-магазин спортивного питания в Украине</span>
            @include('front.elements.breadcrumbs',[$category,$category])
        </div>

    </section>

    <section class="content">
        <div class="content-wrap">
            <router-view></router-view>
        </div>

    </section>
@endsection
