<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Enma Institute</title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend/assets/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- font-awesome CDN -->
    <script src="https://kit.fontawesome.com/8061aaf173.js" crossorigin="anonymous" async></script>
    <!-- NProgress -->
    <link href="{{ asset('backend/assets/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('backend/assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('backend/assets/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Toaster CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <!-- Sidebar Menu -->
                @include('backend.sidebar.sidebar')
            </div>

            <!-- top navigation -->
            @include('backend.header.header')

            <!-- page content - Dynamic Part -->
            <div class="right_col" role="main">
                @yield('dynamic')
            </div>

            <!-- footer content -->
            @include('backend.footer.footer')
        </div>
    </div>

    <script src="{{ asset('backend/assets/vendors/jquery/dist/jquery.min.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/fastclick/lib/fastclick.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/nprogress/nprogress.js') }}" ></script>
    {{-- <script src="{{ asset('backend/assets/vendors/Chart.js/dist/Chart.min.js') }}"  ></script> --}}
    <script src="{{ asset('backend/assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}" ></script>
    {{-- <script src="{{ asset('backend/assets/vendors/Flot/jquery.flot.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/Flot/jquery.flot.pie.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/Flot/jquery.flot.time.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/Flot/jquery.flot.stack.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/Flot/jquery.flot.resize.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/flot.curvedlines/curvedLines.js') }}" ></script> --}}
    {{-- <script src="{{ asset('backend/assets/vendors/DateJS/build/date.js') }}" ></script> --}}
    {{-- <script src="{{ asset('backend/assets/vendors/moment/min/moment.min.js') }}" ></script>
    <script src="{{ asset('backend/assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}" ></script> --}}
    <script src="{{ asset('backend/assets/build/js/custom.min.js') }}" ></script>



    {{-- Toaster JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- Toaster Message --}}
    @if (Session::has('message'))
        <script>
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        </script>
    @endif
</body>

</html>