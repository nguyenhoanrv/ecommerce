@php
$featureds = DB::table('products')
    ->where('status', 1)
    ->limit(10)
    ->get();
$trends = DB::table('products')
    ->where('status', 1)
    ->where('trend', 1)
    ->limit(10)
    ->get();
$best_rateds = DB::table('products')
    ->where('status', 1)
    ->where('best_rated', 1)
    ->limit(10)
    ->get();
$wl = App\Http\Controllers\WishlistController::getWishlist();
@endphp
<div class="product-area pt-55 pb-25 pt-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a class="active" data-toggle="tab" href="#li-featured-product"><span>Featured
                                    Products</span></a></li>
                        <li><a data-toggle="tab" href="#li-trend-product"><span>Trend Products</span></a>
                        </li>
                        <li><a data-toggle="tab" href="#li-best_rated-product"><span>Best Rated
                                    Products</span></a>
                        </li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="li-featured-product" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($featureds as $product)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset($product->image_one) }}" alt="Li's Product Image"
                                                width="206px" height="206px" style="object-fit: cover">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                    href="single-product.html">{{ $product->product_name }}</a>
                                            </h4>
                                            <div class="price-box">
                                                @if ($product->discount_price)
                                                    <span
                                                        class="new-price new-price-2">${{ $product->discount_price }}</span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                    <span class="discount-percentage">
                                                        -{{ number_format((float) ((($product->selling_price - $product->discount_price) * 100) / $product->selling_price), 2, '.', '') }}%</span>

                                                @else
                                                    <span class="new-price">${{ $product->selling_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li class="aaaa"><a class="links-details"
                                                        data-product-id="{{ $product->id }}">
                                                        @isset($wl[$product->id])
                                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                                        @else
                                                            <i class="fa fa-heart-o"></i>
                                                        @endisset
                                                    </a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- trend-product --}}
            <div id="li-trend-product" class="tab-pane " role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($trends as $product)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset($product->image_one) }}" alt="Li's Product Image"
                                                width="206px" height="206px" style="object-fit: cover">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                    href="single-product.html">{{ $product->product_name }}</a>
                                            </h4>
                                            <div class="price-box">
                                                @if ($product->discount_price)
                                                    <span
                                                        class="new-price new-price-2">${{ $product->discount_price }}</span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                    <span class="discount-percentage">
                                                        -{{ number_format((float) ((($product->selling_price - $product->discount_price) * 100) / $product->selling_price), 2, '.', '') }}%</span>

                                                @else
                                                    <span class="new-price">${{ $product->selling_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" href="single-product.html"><i
                                                            class="fa fa-heart-o"
                                                            data-product-id="{{ $product->id }}"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter" href="#"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- best-rated-product --}}

            <div id="li-best_rated-product" class="tab-pane " role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($best_rateds as $product)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset($product->image_one) }}" alt="Li's Product Image"
                                                width="206px" height="206px" style="object-fit: cover">
                                        </a>
                                        <span class="sticker">New</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="product-details.html">Graphic Corner</a>
                                                </h5>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <h4><a class="product_name"
                                                    href="single-product.html">{{ $product->product_name }}</a>
                                            </h4>
                                            <div class="price-box">
                                                @if ($product->discount_price)
                                                    <span
                                                        class="new-price new-price-2">${{ $product->discount_price }}</span>
                                                    <span class="old-price">${{ $product->selling_price }}</span>
                                                    <span class="discount-percentage">
                                                        -{{ number_format((float) ((($product->selling_price - $product->discount_price) * 100) / $product->selling_price), 2, '.', '') }}%</span>

                                                @else
                                                    <span class="new-price">${{ $product->selling_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active"><a href="#">Add to cart</a></li>
                                                <li><a class="links-details" data-product-id="{{ $product->id }}"><i
                                                            class="fa fa-heart-o"></i></a></li>
                                                <li><a class="quick-view" data-toggle="modal"
                                                        data-target="#exampleModalCenter"
                                                        data-product-id="{{ $product->id }}"><i
                                                            class="fa fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script>
        $('.quick-view').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            const id = $(this).attr('data-product-id')
            console.log(id);
            $.ajax({
                type: "GET",
                url: "/product/get/" + id,
                dataType: "json",
                data: {},

                success: (res) => {
                    const product = res.product

                    var html = ` 
                                    <div class="col-lg-5 col-md-6 col-sm-6">
                                        <!-- Product Details Left -->
                                        <div class="product-details-left">
                                            <div class="product-details-images slider-navigation-1">

                                                <div class="lg-image" slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 335px;" tabindex="-1" role="option" aria-describedby="slick-slide00">
                                                    <img src="${product.image_one}" alt="product image">
                                                </div>
                                                <div class="lg-image"  slick-slide slick-current slick-active" data-slick-index="1" aria-hidden="false" style="width: 335px;" tabindex="-1" role="option" aria-describedby="slick-slide00">
                                                    <img src="${product.image_two}" alt="product image">
                                                </div>
                                                <div class="lg-image" slick-slide slick-current slick-active" data-slick-index="2" aria-hidden="false" style="width: 335px;" tabindex="-1" role="option" aria-describedby="slick-slide00">
                                                    <img src="${product.image_three}" alt="product image">
                                                </div>
                                            </div>
                                            <div class="product-details-thumbs slider-thumbs-1">
                                                <div class="sm-image"><img src="${product.image_one}" width="77px" height="77px"
                                                        alt="product image thumb"></div>
                                                <div class="sm-image"><img src="${product.image_two}" width="77px" height="77px"
                                                        alt="product image thumb"></div>
                                                <div class="sm-image"><img src="${product.image_three}" width="77px" height="77px"
                                                        alt="product image thumb"></div>
                                            </div>
                                        </div>
                                        <!--// Product Details Left -->
                                    </div>

                                    <div class="col-lg-7 col-md-6 col-sm-6">
                                        <div class="product-details-view-content pt-60">
                                            <div class="product-info">
                                                <h2>${product.product_name}</h2>
                                                <span class="product-details-ref">Reference: demo_15</span>
                                                <div class="rating-box pt-20">
                                                    <ul class="rating rating-with-review-item">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="review-item"><a href="#">Read Review</a></li>
                                                        <li class="review-item"><a href="#">Write Review</a></li>
                                                    </ul>
                                                </div>
                                                <div class="price-box pt-20">
                                                    <span class="new-price new-price-2">$57.98</span>
                                                </div>
                                                <div class="product-desc">
                                                    ${product.product_details}
                                                </div>
                                                <div class="product-variants">
                                                    <div class="produt-variants-size">
                                                        <label>Dimension</label>
                                                        <select class="nice-select">
                                                            <option value="1" title="S" selected="selected">40x60cm</option>
                                                            <option value="2" title="M">60x90cm</option>
                                                            <option value="3" title="L">80x120cm</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="single-add-to-cart">
                                                    <form action="#" class="cart-quantity">
                                                        <div class="quantity">
                                                            <label>Quantity</label>
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" value="1" type="text">
                                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                                </div>
                                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                            </div>
                                                        </div>
                                                        <button class="add-to-cart" type="submit">Add to cart</button>
                                                    </form>
                                                </div>
                                                <div class="product-additional-info pt-25">
                                                    <a class="wishlist-btn links-details" data-product-id="${product.id}"><i
                                                            class="fa fa-heart-o"></i>Add to wishlist</a>
                                                    <div class="product-social-sharing pt-25">
                                                        <ul>
                                                            <li class="facebook"><a href="#"><i
                                                                        class="fa fa-facebook"></i>Facebook</a></li>
                                                            <li class="twitter"><a href="#"><i
                                                                        class="fa fa-twitter"></i>Twitter</a></li>
                                                            <li class="google-plus"><a href="#"><i
                                                                        class="fa fa-google-plus"></i>Google +</a></li>
                                                            <li class="instagram"><a href="#"><i
                                                                        class="fa fa-instagram"></i>Instagram</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                        `
                    $('#content-modal').html(

                        html
                    )
                },
                error: function() {}
            });

        });

    </script>
@endsection
