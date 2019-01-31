@extends('layouts.app')

@section('content')
    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{$category->name}}</h1>
            <span>интернет-магазин спортивного питания в Украине</span>
            <div class="row">
                {{--<ol class="breadcrumb">--}}
                {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}

                {{--@foreach($breadcrambs as $item)--}}

                {{--<li class="breadcrumb-item active" aria-current="page">{{$item}}</li>--}}

                {{--@endforeach--}}
                {{--@endforeach--}}
                {{--</ol>--}}
            </div>
            {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
            {{--<li class="breadcrumb-item active" aria-current="page">Shop</li>--}}
            {{--</ol>--}}
            @include('front.elements.breadcrumbs',[$category,$category])
        </div>

    </section><!-- #page-title end -->

    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin col_last">

                    <!-- Shop
                    ============================================= -->
                    <div id="shop" class="shop product-3 grid-container clearfix" data-layout="fitRows">

                        @if(count($products) > 0)
                            @foreach($products as $product)
                                @include('front.shop.elements.product_box',[$product,$product])
                            @endforeach
                        @else
                            <div class="alert-info">
                                Продукты по данному критерию отсутствуют.
                            </div>
                        @endif

                        {{--{{ $products->links() }}--}}


                    </div><!-- #shop end -->

                </div><!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin">
                    <div class="sidebar-widgets-wrap">
                        <div class="widget clearfix">
                            <h4>Производитель</h4>
                            @foreach($vendors as $name => $count )
                                <div>
                                    <input id="vendor-{{$name}}" class="checkbox-style" data-vendor="{{$name}}" name="checkbox-11"
                                           type="checkbox">
                                    <label for="vendor-{{$name}}" class="checkbox-style-3-label">{{$name}} ({{$count}}
                                        )</label>
                                </div>
                            @endforeach
                        </div>
                        @if(count($allIngredients) > 0)
                            <div class="widget clearfix">
                                <h4>Ингридиенты</h4>
                                @foreach($allIngredients as $name => $count )
                                    <div>
                                        @if($count > 0)
                                            <input id="vendor-{{$name}}" data-attribute-ingredient="{{$name}}" class="checkbox-style" name="checkbox-11"
                                                   type="checkbox">
                                            <label for="vendor-{{$name}}" class="checkbox-style-3-label">{{$name}}
                                                ({{$count}})</label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if(count($allGoals) > 0)
                            <div class="widget clearfix">
                                <h4>Ингридиенты</h4>
                                @foreach($allGoals as $name => $count )
                                    <div>
                                        @if($count > 0)
                                            <input id="vendor-{{$name}}" data-attribute-goal="{{$name}}" class="checkbox-style" name="checkbox-11"
                                                   type="checkbox">
                                            <label for="vendor-{{$name}}" class="checkbox-style-3-label">{{$name}}
                                                ({{$count}})</label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if(count($tastes) > 0)
                            <div class="widget clearfix">
                                <h4>Вкусы</h4>
                                @foreach($tastes as $name => $count )
                                    <div>
                                        @if($count > 0)
                                        <input id="vendor-{{$name}}" class="checkbox-style" name="checkbox-11" data-attribute-taste="{{$name}}"
                                               type="checkbox">
                                        <label for="vendor-{{$name}}" class="checkbox-style-3-label">{{$name}}
                                            ({{$count}})</label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if(count($colors) > 0)
                            <div class="widget clearfix">
                                <h4>Цвет</h4>
                                @foreach($colors as $name => $count )
                                    <div>
                                        @if($count > 0)
                                            <input id="vendor-{{$name}}" class="checkbox-style" name="checkbox-11" data-attribute-color="{{$name}}"
                                                   type="checkbox">
                                            <label for="vendor-{{$name}}" class="checkbox-style-3-label">{{$name}}
                                                ({{$count}})</label>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="widget clearfix">

                            <h4>Recent Items</h4>
                            <div id="post-list-footer">

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/1.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Blue Round-Neck Tshirt</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$29.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star-half-full"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/6.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Checked Short Dress</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$23.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i> <i class="icon-star-half-full"></i> <i
                                                        class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/7.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Light Blue Denim Dress</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$19.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i> <i class="icon-star-empty"></i> <i
                                                        class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="widget clearfix">

                            <h4>Last Viewed Items</h4>
                            <div class="widget-last-view">
                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/3.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Round-Neck Tshirt</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$15</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/10.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Green Trousers</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$19</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i
                                                        class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/11.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Silver Chrome Watch</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$34.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i> <i class="icon-star-half-full"></i> <i
                                                        class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="widget clearfix">

                            <h4>Popular Items</h4>
                            <div id="Popular-item">
                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/8.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Pink Printed Dress</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$21</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star-half-full"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/5.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Blue Round-Neck Tshirt</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$19.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star3"></i> <i class="icon-star-empty"></i> <i
                                                        class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="spost clearfix">
                                    <div class="entry-image">
                                        <a href="#"><img src="/images/shop/small/12.jpg" alt="Image"></a>
                                    </div>
                                    <div class="entry-c">
                                        <div class="entry-title">
                                            <h4><a href="#">Men Aviator Sunglasses</a></h4>
                                        </div>
                                        <ul class="entry-meta">
                                            <li class="color">$14.99</li>
                                            <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i
                                                        class="icon-star-half-full"></i> <i class="icon-star-empty"></i>
                                                <i class="icon-star-empty"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="widget clearfix">
                            <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583"
                                    scrolling="no" frameborder="0"
                                    style="border:none; overflow:hidden; width:240px; height:290px;"
                                    allowTransparency="true"></iframe>
                        </div>

                        <div class="widget subscribe-widget clearfix">

                            <h4>Subscribe For Latest Offers</h4>
                            <h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside
                                Scoops:</h5>
                            <form action="#" role="form" class="notopmargin nobottommargin">
                                <div class="input-group divcenter">
                                    <input type="text" class="form-control" placeholder="Enter your Email" required="">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit"><i class="icon-email2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="widget clearfix">

                            {{--<div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1"--}}
                            {{--data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000"--}}
                            {{--data-pagi="false">--}}

                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/1.png" alt="Clients"></a>--}}
                            {{--</div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/2.png" alt="Clients"></a>--}}
                            {{--</div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/3.png" alt="Clients"></a>--}}
                            {{--</div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/4.png" alt="Clients"></a>--}}
                            {{--</div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/5.png" alt="Clients"></a>--}}
                            {{--</div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/6.png" alt="Clients"></a>--}}
                            {{--</div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/7.png" alt="Clients"></a>--}}
                            {{--</div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="/images/clients/8.png" alt="Clients"></a>--}}
                            {{--</div>--}}

                            {{--</div>--}}

                        </div>

                    </div>
                </div><!-- .sidebar end -->

            </div>

        </div>

    </section><!-- #content end -->
@endsection