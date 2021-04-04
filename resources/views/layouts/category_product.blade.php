@php
$categories = App\Models\Category::with('products')->get();
$wl = App\Http\Controllers\WishlistController::getWishlist();
@endphp

@foreach ($categories as $category)
    <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>{{ $category->category_name }}</span>
                        </h2>
                        <ul class="li-sub-category-list">
                            <li class="active"><a href="shop-left-sidebar.html">Prime Video</a></li>
                            <li><a href="shop-left-sidebar.html">Computers</a></li>
                            <li><a href="shop-left-sidebar.html">Electronics</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($category->products as $product)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{ route('product.detail', ['id' => $product->id]) }}" )">
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
                                                        href="{{ route('product.detail', ['id' => $product->id]) }}">{{ $product->product_name }}</a>
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
                                                    <li class="add-cart active" data-product-id="{{ $product->id }}"><a href="">Add to cart</a></li>
                                                    <li class="aaaa"><a class="links-details"
                                                        data-product-id="{{ $product->id }}">
                                                        @isset($wl[$product->id])
                                                            <i class="fa fa-heart" aria-hidden="true"></i>

                                                        @else
                                                            <i class="fa fa-heart-o"></i>
                                                        @endisset
                                                    </a></li>
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
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
@endforeach

<!-- Li's Laptop Product Area End Here -->
<!-- Begin Li's TV & Audio Product Area -->
