 <script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
 <!-- Popper js -->
 <script src="{{ asset('frontend/js/vendor/popper.min.js') }}"></script>
 <!-- Bootstrap V4.1.3 Fremwork js -->
 <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
 <!-- Ajax Mail js -->
 <script src="{{ asset('frontend/js/ajax-mail.js') }}"></script>
 <!-- Meanmenu js -->
 <script src="{{ asset('frontend/js/jquery.meanmenu.min.js') }}"></script>
 <!-- Wow.min js -->
 <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
 <!-- Slick Carousel js -->
 <script src="{{ asset('frontend/js/slick.min.js') }}"></script>
 <!-- Owl Carousel-2 js -->
 <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
 <!-- Magnific popup js -->
 <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
 <!-- Isotope js -->
 <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
 <!-- Imagesloaded js -->
 <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
 <!-- Mixitup js -->
 <script src="{{ asset('frontend/js/jquery.mixitup.min.js') }}"></script>
 <!-- Countdown -->
 <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
 <!-- Counterup -->
 <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
 <!-- Waypoints -->
 <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
 <!-- Barrating -->
 <script src="{{ asset('frontend/js/jquery.barrating.min.js') }}"></script>
 <!-- Jquery-ui -->
 <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
 <!-- Venobox -->
 <script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
 <!-- Nice Select js -->
 <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
 <!-- ScrollUp js -->
 <script src="{{ asset('frontend/js/scrollUp.min.js') }}"></script>
 <script src="{{ asset('frontend/js/toastr.min.js') }}"></script>
 <!-- Main/Activator js -->
 <script src="{{ asset('frontend/js/main.js') }}"></script>
<script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
   @if(session('message'))
        toastr["{{ session('type') }}"]("{{ session('message') }}")
        @endif
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $('.links-details').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/wishlist/store",
                cache: "false",
                dataType: "json",
                data: {
                    product_id: $(this).attr('data-product-id')
                },

                success: (res) => {
                    var count = $('.wishlist-item-count').text();
                    if (!res.check) {
                        $(this).children().removeClass('fa fa-heart-o');
                        $(this).children().addClass('fa fa-heart');
                        $('.wishlist-item-count').text(parseInt(count) + 1)
                        toastr[res.type](res.message)
                    } else {
                        $(this).children().removeClass('fa fa-heart');
                        $(this).children().addClass('fa fa-heart-o');
                        $('.wishlist-item-count').text(parseInt(count) - 1)
                        toastr[res.type](res.message)
                    }
                },
                error: function() {
                    toastr["error"]("Please Login!")
                }
            });

        });

    </script>