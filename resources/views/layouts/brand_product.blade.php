@php

$brands = App\Models\Brand::with([
    'products' => function ($query) {
        return $query->take(3);
    },
])->get();
@endphp
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"></div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Sale Offer<span>-20% Off</span>This Week</p>
                    <h2>Featured Product</h2>
                    <h2>Sanai Accessories 2018</h2>
                    <p class="schedule">
                        Starting at
                        <span> $1209.00</span>
                    </p>
                    <div class="default-btn">
                        <a href="shop-left-sidebar.html" class="links">Shopping Now</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div>
<!-- Li's Static Home Area End Here -->
<!-- Begin Group Featured Product Area -->
<div class="group-featured-product pt-60 pb-40 pb-xs-25">
    <div class="container">
        <div class="row">
            <!-- Begin Featured Product Area -->
            @foreach ($brands as $brand)
                <div class="col-lg-4">
                    <div class="featured-product">
                        <div class="li-section-title">
                            <h2>
                                <span>{{ $brand->brand_name }}</span>
                            </h2>
                        </div>
                        <div class="featured-product-active-2 owl-carousel">
                            <div class="featured-product-bundle">
                                @foreach ($brand->products as $product)
                                    <div class="row">
                                        <div class="group-featured-pro-wrapper">
                                            <div class="product-img">
                                                <a href="product-details.html">
                                                    <img alt="" src="{{ $product->image_one }}">
                                                </a>
                                            </div>
                                            <div class="featured-pro-content">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="product-details.html">Studio Design</a>
                                                    </h5>
                                                </div>
                                                <div class="rating-box">
                                                    <ul class="rating">
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                                <h4><a class="featured-product-name"
                                                        href="single-product.html">{{ $product->product_name }}</a>
                                                </h4>
                                                <div class="featured-price-box">
                                                    <div class="price-box">
                                                        @if ($product->discount_price)
                                                            <span
                                                                class="new-price new-price-2">${{ $product->discount_price }}</span>
                                                            <span
                                                                class="old-price">${{ $product->selling_price }}</span>
                                                            <span class="discount-percentage">
                                                                -{{ number_format((float) ((($product->selling_price - $product->discount_price) * 100) / $product->selling_price), 2, '.', '') }}%</span>

                                                        @else
                                                            <span
                                                                class="new-price">${{ $product->selling_price }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Featured Product Area End Here -->
        </div>
    </div>
</div>
