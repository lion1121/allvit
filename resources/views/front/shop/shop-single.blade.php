@extends('layouts.app')

@section('content')
<!-- Page Title
    ============================================= -->
<section id="page-title">

    <div class="container clearfix">
        <h1>{{$product->category_name}}</h1>
        <span>интернет-магазин спортивного питания в Украине</span>
        {{--<ol class="breadcrumb">--}}
            {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
            {{--<li class="breadcrumb-item active" aria-current="page">Shop</li>--}}
        {{--</ol>--}}
        {{ Breadcrumbs::render('product', $product) }}
    </div>

</section><!-- #page-title end -->

<section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="postcontent nobottommargin clearfix col_last">

                <div class="single-product">

                    <div class="product">

                        <div class="col_half">

                            <!-- Product Single - Gallery
                            ============================================= -->
                            <div class="product-image">
                                <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                    <div class="flexslider">
                                        <div class="slider-wrap" data-lightbox="gallery">
                                            @if($product->image)
                                            <div class="slide" data-thumb="images/shop/thumbs/dress/3.jpg"><a href="images/shop/dress/3.jpg" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="images/shop/dress/3.jpg" alt="Pink Printed Dress"></a></div>
                                            <div class="slide" data-thumb="images/shop/thumbs/dress/3-1.jpg"><a href="images/shop/dress/3-1.jpg" title="Pink Printed Dress - Side View" data-lightbox="gallery-item"><img src="images/shop/dress/3-1.jpg" alt="Pink Printed Dress"></a></div>
                                            <div class="slide" data-thumb="images/shop/thumbs/dress/3-2.jpg"><a href="images/shop/dress/3-2.jpg" title="Pink Printed Dress - Back View" data-lightbox="gallery-item"><img src="images/shop/dress/3-2.jpg" alt="Pink Printed Dress"></a></div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="sale-flash">Sale!</div>
                            </div><!-- Product Single - Gallery End -->

                        </div>

                        <div class="col_half col_last product-desc">

                            <!-- Product Single - Price
                            ============================================= -->
                            <div class="product-price"><del>$39.99</del> <ins>$24.99</ins></div><!-- Product Single - Price End -->

                            <!-- Product Single - Rating
                            ============================================= -->
                            <div class="product-rating">
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star3"></i>
                                <i class="icon-star-half-full"></i>
                                <i class="icon-star-empty"></i>
                            </div><!-- Product Single - Rating End -->

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

                            <!-- Product Single - Short Description
                            ============================================= -->
                            {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero velit id eaque ex quae laboriosam nulla optio doloribus! Perspiciatis, libero, neque, perferendis at nisi optio dolor!</p>--}}
                            {{--<p>Perspiciatis ad eveniet ea quasi debitis quos laborum eum reprehenderit eaque explicabo assumenda rem modi.</p>--}}
                            {{$product->full_name}}, ({{$product->weight}} гр.)
                            <ul class="iconlist">
                                <li><i class="icon-caret-right"></i> Производитель: {{$product->vendor}}</li>
                                <li><i class="icon-caret-right"></i> Фасовка:</li>
                                <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
                            </ul><!-- Product Single - Short Description End -->

                            <!-- Product Single - Meta
                            ============================================= -->
                            <div class="card product-meta">
                                <div class="card-body">
                                    <span itemprop="productID" class="sku_wrapper">КОД: <span class="sku">{{$product->vendor_code}}</span></span>
                                    <span class="posted_in">Катерория: <a href="{{route('category')}}/{{$product->getCategoryUrl()}}" rel="tag">{{$product->categories()->first()->name}}</a>.</span>
                                    <span class="tagged_as">Tags: <a href="#" rel="tag">Pink</a>, <a href="#" rel="tag">Short</a>, <a href="#" rel="tag">Dress</a>, <a href="#" rel="tag">Printed</a>.</span>
                                </div>
                            </div><!-- Product Single - Meta End -->

                            <!-- Product Single - Share
                            ============================================= -->
                            <div class="si-share noborder clearfix">
                                <span>Share:</span>
                                <div>
                                    <a href="#" class="social-icon si-borderless si-facebook">
                                        <i class="icon-facebook"></i>
                                        <i class="icon-facebook"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-twitter">
                                        <i class="icon-twitter"></i>
                                        <i class="icon-twitter"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-pinterest">
                                        <i class="icon-pinterest"></i>
                                        <i class="icon-pinterest"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-gplus">
                                        <i class="icon-gplus"></i>
                                        <i class="icon-gplus"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-rss">
                                        <i class="icon-rss"></i>
                                        <i class="icon-rss"></i>
                                    </a>
                                    <a href="#" class="social-icon si-borderless si-email3">
                                        <i class="icon-email3"></i>
                                        <i class="icon-email3"></i>
                                    </a>
                                </div>
                            </div><!-- Product Single - Share End -->

                        </div>

                        <div class="col_full nobottommargin">

                            <div class="tabs clearfix nobottommargin" id="tab-1">

                                <ul class="tab-nav clearfix">
                                    <li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="d-none d-md-inline-block"> Описание</span></a></li>
                                    <li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="d-none d-md-inline-block"> Дополнительная информация</span></a></li>
                                    <li><a href="#tabs-3"><i class="icon-star3"></i><span class="d-none d-md-inline-block"> Отзывы (2)</span></a></li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tabs-1">
                                        <p>Pink printed dress,  woven, round neck with a keyhole and buttoned closure at the back, sleeveless, concealed zip up at left side seam, belt loops along waist with slight gathers beneath, brand appliqu?? above left front hem, has an attached lining.</p>
                                        Comes with a white, slim synthetic belt that has a tang clasp.
                                    </div>
                                    <div class="tab-content clearfix" id="tabs-2">

                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>Size</td>
                                                <td>Small, Medium &amp; Large</td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>Pink &amp; White</td>
                                            </tr>
                                            <tr>
                                                <td>Waist</td>
                                                <td>26 cm</td>
                                            </tr>
                                            <tr>
                                                <td>Length</td>
                                                <td>40 cm</td>
                                            </tr>
                                            <tr>
                                                <td>Chest</td>
                                                <td>33 inches</td>
                                            </tr>
                                            <tr>
                                                <td>Fabric</td>
                                                <td>Cotton, Silk &amp; Synthetic</td>
                                            </tr>
                                            <tr>
                                                <td>Warranty</td>
                                                <td>3 Months</td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div class="tab-content clearfix" id="tabs-3">

                                        <div id="reviews" class="clearfix">

                                            <ol class="commentlist clearfix">

                                                <li class="comment even thread-even depth-1" id="li-comment-1">
                                                    <div id="comment-1" class="comment-wrap clearfix">

                                                        <div class="comment-meta">
                                                            <div class="comment-author vcard">
																		<span class="comment-avatar clearfix">
																		<img alt='' src='https://via.placeholder.com/150' height='60' width='60' /></span>
                                                            </div>
                                                        </div>

                                                        <div class="comment-content clearfix">
                                                            <div class="comment-author">John Doe<span><a href="#" title="Permalink to this comment">April 24, 2014 at 10:46AM</a></span></div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo perferendis aliquid tenetur. Aliquid, tempora, sit aliquam officiis nihil autem eum at repellendus facilis quaerat consequatur commodi laborum saepe non nemo nam maxime quis error tempore possimus est quasi reprehenderit fuga!</p>
                                                            <div class="review-comment-ratings">
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star-half-full"></i>
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>

                                                    </div>
                                                </li>

                                                <li class="comment even thread-even depth-1" id="li-comment-1">
                                                    <div id="comment-1" class="comment-wrap clearfix">

                                                        <div class="comment-meta">
                                                            <div class="comment-author vcard">
																		<span class="comment-avatar clearfix">
																		<img alt='' src='' height='60' width='60' /></span>
                                                            </div>
                                                        </div>

                                                        <div class="comment-content clearfix">
                                                            <div class="comment-author">Mary Jane<span><a href="#" title="Permalink to this comment">June 16, 2014 at 6:00PM</a></span></div>
                                                            <p>Quasi, blanditiis, neque ipsum numquam odit asperiores hic dolor necessitatibus libero sequi amet voluptatibus ipsam velit qui harum temporibus cum nemo iste aperiam explicabo fuga odio ratione sint fugiat consequuntur vitae adipisci delectus eum incidunt possimus tenetur excepturi at accusantium quod doloremque reprehenderit aut expedita labore error atque?</p>
                                                            <div class="review-comment-ratings">
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star3"></i>
                                                                <i class="icon-star-empty"></i>
                                                                <i class="icon-star-empty"></i>
                                                            </div>
                                                        </div>

                                                        <div class="clear"></div>

                                                    </div>
                                                </li>

                                            </ol>

                                            <!-- Modal Reviews
                                            ============================================= -->
                                            <a href="#" data-toggle="modal" data-target="#reviewFormModal" class="button button-3d nomargin fright">Add a Review</a>

                                            <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="nobottommargin" id="template-reviewform" name="template-reviewform" action="#" method="post">

                                                                <div class="col_half">
                                                                    <label for="template-reviewform-name">Name <small>*</small></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text"><i class="icon-user"></i></div>
                                                                        </div>
                                                                        <input type="text" id="template-reviewform-name" name="template-reviewform-name" value="" class="form-control required" />
                                                                    </div>
                                                                </div>

                                                                <div class="col_half col_last">
                                                                    <label for="template-reviewform-email">Email <small>*</small></label>
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><div class="input-group-text">@</div></div>
                                                                        <input type="email" id="template-reviewform-email" name="template-reviewform-email" value="" class="required email form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="clear"></div>

                                                                <div class="col_full col_last">
                                                                    <label for="template-reviewform-rating">Rating</label>
                                                                    <select id="template-reviewform-rating" name="template-reviewform-rating" class="form-control">
                                                                        <option value="">-- Select One --</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </div>

                                                                <div class="clear"></div>

                                                                <div class="col_full">
                                                                    <label for="template-reviewform-comment">Comment <small>*</small></label>
                                                                    <textarea class="required form-control" id="template-reviewform-comment" name="template-reviewform-comment" rows="6" cols="30"></textarea>
                                                                </div>

                                                                <div class="col_full nobottommargin">
                                                                    <button class="button button-3d nomargin" type="submit" id="template-reviewform-submit" name="template-reviewform-submit" value="submit">Submit Review</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <!-- Modal Reviews End -->

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="line"></div>

                            <div class="col_one_third nobottommargin">
                                <a href="#" title="Brand Logo" class="d-none d-md-block"><img class="image_fade" src="" alt="Brand Logo"></a>
                            </div>

                            <div class="col_two_third col_last nobottommargin">

                                <div class="col_half">

                                    <div class="feature-box fbox-plain fbox-dark fbox-small">
                                        <div class="fbox-icon">
                                            <i class="icon-thumbs-up2"></i>
                                        </div>
                                        <h3>100% Original Brands</h3>
                                        <p class="notopmargin">We guarantee you the sale of Original Brands with warranties.</p>
                                    </div>

                                </div>

                                <div class="col_half col_last">

                                    <div class="feature-box fbox-plain fbox-dark fbox-small">
                                        <div class="fbox-icon">
                                            <i class="icon-credit-cards"></i>
                                        </div>
                                        <h3>Lots of Payment Options</h3>
                                        <p class="notopmargin">We accept Visa, MasterCard and American Express &amp; of-course PayPal.</p>
                                    </div>

                                </div>

                                <div class="col_half nobottommargin">

                                    <div class="feature-box fbox-plain fbox-dark fbox-small">
                                        <div class="fbox-icon">
                                            <i class="icon-truck2"></i>
                                        </div>
                                        <h3>Free Express Shipping</h3>
                                        <p class="notopmargin">Free Delivery to 100+ Locations Worldwide on orders above $40.</p>
                                    </div>

                                </div>

                                <div class="col_half col_last nobottommargin">

                                    <div class="feature-box fbox-plain fbox-dark fbox-small">
                                        <div class="fbox-icon">
                                            <i class="icon-undo"></i>
                                        </div>
                                        <h3>30-Days Returns Policy</h3>
                                        <p class="notopmargin">Return or exchange items purchased within 30 days for Free.</p>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="clear"></div><div class="line"></div>

                <div class="col_full nobottommargin">

                    <h4>Related Products</h4>

                    <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-xl="4">

                        <div class="oc-item">
                            <div class="product iproduct clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="" alt="Checked Short Dress"></a>
                                    <a href="#"><img src="" alt="Checked Short Dress"></a>
                                    <div class="sale-flash">50% Off*</div>
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                        <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#">Checked Short Dress</a></h3></div>
                                    <div class="product-price"><del>$24.99</del> <ins>$12.49</ins></div>
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

                        <div class="oc-item">
                            <div class="product iproduct clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="" alt="Slim Fit Chinos"></a>
                                    <a href="#"><img src="" alt="Slim Fit Chinos"></a>
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                        <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#">Slim Fit Chinos</a></h3></div>
                                    <div class="product-price">$39.99</div>
                                    <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-half-full"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="oc-item">
                            <div class="product iproduct clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="" alt="Dark Brown Boots"></a>
                                    <a href="#"><img src="" alt="Dark Brown Boots"></a>
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                        <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#">Dark Brown Boots</a></h3></div>
                                    <div class="product-price">$49</div>
                                    <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-empty"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="oc-item">
                            <div class="product iproduct clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="" alt="Light Blue Denim Dress"></a>
                                    <a href="#"><img src="" alt="Light Blue Denim Dress"></a>
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                        <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#">Light Blue Denim Dress</a></h3></div>
                                    <div class="product-price">$19.95</div>
                                    <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="oc-item">
                            <div class="product iproduct clearfix">
                                <div class="product-image">
                                    <a href="#"><img src="" alt="Unisex Sunglasses"></a>
                                    <a href="#"><img src="" alt="Unisex Sunglasses"></a>
                                    <div class="sale-flash">Sale!</div>
                                    <div class="product-overlay">
                                        <a href="#" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
                                        <a href="include/ajax/shop-item.html" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                    </div>
                                </div>
                                <div class="product-desc center">
                                    <div class="product-title"><h3><a href="#">Unisex Sunglasses</a></h3></div>
                                    <div class="product-price"><del>$19.99</del> <ins>$11.99</ins></div>
                                    <div class="product-rating">
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star3"></i>
                                        <i class="icon-star-empty"></i>
                                        <i class="icon-star-empty"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="sidebar nobottommargin clearfix">
                <div class="sidebar-widgets-wrap">

                    <div class="widget widget_links clearfix">

                        <h4>Shop Categories</h4>
                        <ul>
                            <li><a href="#">Shirts</a></li>
                            <li><a href="#">Pants</a></li>
                            <li><a href="#">Tshirts</a></li>
                            <li><a href="#">Sunglasses</a></li>
                            <li><a href="#">Shoes</a></li>
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Watches</a></li>
                        </ul>

                    </div>

                    <div class="widget clearfix">

                        <h4>Recent Items</h4>
                        <div id="post-list-footer">

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Blue Round-Neck Tshirt</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$29.99</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Checked Short Dress</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$23.99</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Light Blue Denim Dress</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$19.99</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
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
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Round-Neck Tshirt</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$15</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Green Trousers</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$19</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Silver Chrome Watch</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$34.99</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i></li>
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
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Pink Printed Dress</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$21</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Blue Round-Neck Tshirt</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$19.99</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spost clearfix">
                                <div class="entry-image">
                                    <a href="#"><img src="" alt="Image"></a>
                                </div>
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h4><a href="#">Men Aviator Sunglasses</a></h4>
                                    </div>
                                    <ul class="entry-meta">
                                        <li class="color">$14.99</li>
                                        <li><i class="icon-star3"></i> <i class="icon-star3"></i> <i class="icon-star-half-full"></i> <i class="icon-star-empty"></i> <i class="icon-star-empty"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="widget clearfix">
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FEnvato&amp;width=240&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=499481203443583" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:290px;" allowTransparency="true"></iframe>
                    </div>

                    <div class="widget subscribe-widget clearfix">

                        <h4>Subscribe For Latest Offers</h4>
                        <h5>Subscribe to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
                        <form action="#" role="form" class="notopmargin nobottommargin">
                            <div class="input-group divcenter">
                                <input type="text" class="form-control" placeholder="Enter your Email" required="">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"><i class="icon-email2"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="widget clearfix">

                        <div id="oc-clients-full" class="owl-carousel image-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000" data-pagi="false">

                            {{--<div class="oc-item"><a href="#"><img src="images/clients/1.png" alt="Clients"></a></div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="images/clients/2.png" alt="Clients"></a></div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="images/clients/3.png" alt="Clients"></a></div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="images/clients/4.png" alt="Clients"></a></div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="images/clients/5.png" alt="Clients"></a></div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="images/clients/6.png" alt="Clients"></a></div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="images/clients/7.png" alt="Clients"></a></div>--}}
                            {{--<div class="oc-item"><a href="#"><img src="images/clients/8.png" alt="Clients"></a></div>--}}

                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>



</section><!-- #content end -->
@endsection