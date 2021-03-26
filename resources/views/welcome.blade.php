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
@endphp
@extends('layouts.app')

@section('content')
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
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
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
                                                                class="fa fa-heart-o"></i></a></li>
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
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
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
            </div>
        </div>
    </div>
@endsection
