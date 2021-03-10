<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8" />
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
  <meta content="Themesbrand" name="author" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- App favicon -->
  <link rel="shortcut icon" href="{{URL::asset('backend/images/favicon.ico')}}">

  <link rel="stylesheet" type="text/css" href="{{URL::asset('backend/libs/toastr/build/toastr.min.css')}}">
  <!-- Bootstrap Css -->
  <link href="{{URL::asset('backend/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="{{URL::asset('backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="{{URL::asset('backend/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
  @yield('css')
</head>

<body data-sidebar="dark">

  <!-- <body data-layout="horizontal" data-topbar="dark"> -->

  <!-- Begin page -->
  @guest('admin')
  @yield('login')
  @else

  <div id="layout-wrapper">
    @include('admin.layouts.topbar')
      <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layouts.slidebar')

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">
          @yield('content')
        </div>
        <!-- container-fluid -->
      </div>
     

      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <script>document.write(new Date().getFullYear())</script> © Skote.
            </div>
            <div class="col-sm-6">
              <div class="text-sm-end d-none d-sm-block">
                Design & Develop by Themesbrand
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- end main content-->

  </div>
  <!-- END layout-wrapper -->

  <!-- Right bar overlay-->
  @endguest

  <!-- JAVASCRIPT -->
  <script src="{{URL::asset('backend/libs/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{URL::asset('backend/libs/metismenu/metisMenu.min.js')}}"></script>
  <script src="{{URL::asset('backend/libs/simplebar/simplebar.min.js')}}"></script>
  <script src="{{URL::asset('backend/libs/node-waves/waves.min.js')}}"></script>
  <!-- apexcharts -->

  <!-- dashboard init -->
  <script src="{{URL::asset('backend/libs/toastr/build/toastr.min.js')}}"></script>

  <!-- toastr init -->
  <script src="{{URL::asset('backend/js/pages/toastr.init.js')}}"></script>



  <script>
    console.log("{{ session('message_noti') }}");
    @if(session('message_noti'))
        toastr["{{ session('type') }}"]("{{ session('message_noti') }}")
    @endif
  </script>
  <script src="{{URL::asset('backend/js/app.js')}}"></script>

  @yield('script')

</body>

</html>