<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- index-431:41-->

<head>
    @include('layouts.style')
</head>

<body>
    <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
 <![endif]-->
    <!-- Begin Body Wrapper -->
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        @include('layouts.header')
        <!-- Header Area End Here -->
        <!-- Begin Slider With Banner Area -->
        <!-- Slider With Banner Area End Here -->
        <!-- Begin Static Top Area -->

        <!-- Static Top Area End Here -->
        <!-- product-area start -->
        @yield('content')
        <!-- product-area end -->
        <!-- Begin Li's Static Banner Area -->

        <!-- Li's Static Banner Area End Here -->
        <!-- Begin Li's Laptop Product Area -->

        <!-- Li's TV & Audio Product Area End Here -->
        <!-- Begin Li's Static Home Area -->

        <!-- Group Featured Product Area End Here -->
        <!-- Begin Footer Area -->
        @include('layouts.footer')
        <!-- Footer Area End Here -->
        <!-- Begin Quick View | Modal Area -->
        <div class="modal fade modal-wrapper" id="exampleModalCenter">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area row" id="content-modal">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View | Modal Area End Here -->
    </div>
    <!-- Body Wrapper End Here -->
    <!-- jQuery-V1.12.4 -->
    @include('layouts.script')
    @yield('script')
</body>

<!-- index-431:47-->

</html>

</html>
