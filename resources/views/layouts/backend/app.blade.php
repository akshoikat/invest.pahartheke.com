<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Dashboard | RebootX </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/backend/images/favicon.ico') }}">
    <link href="{{ asset('assets/backend/libs/chartist/chartist.min.css') }}" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/backend/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('assets/backend/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('assets/backend/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

    <!-- Bootstrap 5 CDN Example -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('backend.partials.header')

        <!-- ========== Left Sidebar Start ========== -->
        @include('backend.partials.sidebar')
        <!-- Left Sidebar End -->

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
            <!-- End Page-content -->



            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by RebootX</span>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/backend/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/node-waves/waves.min.js')}}"></script>


    <!-- Peity chart-->
    <script src="{{asset('assets/backend/libs/peity/jquery.peity.min.js')}}"></script>
    <!-- Plugin Js-->
    <script src="{{asset('assets/backend/libs/chartist/chartist.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/chartist-plugin-tooltips/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/dashboard.init.js')}}"></script>
    <script src="{{asset('assets/backend/js/app.js')}}"></script>

    @stack('scripts')
</body>

</html>
