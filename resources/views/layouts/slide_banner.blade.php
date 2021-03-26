@php
$sliders = DB::table('products')
    ->where('status', 1)
    ->where('main_slider', 1)
    ->orderBy('created_at', 'desc')
    ->limit(3)
    ->get();

$mid_sliders = DB::table('products')
    ->where('status', 1)
    ->where('mid_slider', 1)
    ->orderBy('created_at', 'desc')
    ->limit(2)
    ->get();
@endphp
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        @foreach ($sliders as $slider)
                            <div class="{{ 'single-slide align-center-left bg animation-style-0' . $loop->index % 2 + 1 }}"
                                id="{{ $slider->id }}">
                                <script type="text/javascript">
                                    var id = {!! json_encode($slider->id) !!};
                                    var url = {!! json_encode($slider->image_one) !!};
                                    $('#' + id).css('background-image', `url(${url})`);

                                </script>
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span> -20% Off</span> This Week</h5>
                                    <h2>{{ $slider->product_name }}</h2>
                                    <h3>Starting at <span>${{ $slider->selling_price }}</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
            <!-- Begin Li Banner Area -->
            <div class="col-lg-4 col-md-4 text-center pt-sm-30 pt-xs-30">
                <div class="li-banner">
                    <a href="#">
                        <img src="{{ asset('frontend/images/banner/1_1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="li-banner mt-15 mt-md-30 mt-xs-25 mb-xs-5">
                    <a href="#">
                        <img src="{{ asset('frontend/images/banner/1_2.jpg') }}" alt="">
                    </a>
                </div>
            </div>
            <!-- Li Banner Area End Here -->
        </div>
    </div>
</div>
