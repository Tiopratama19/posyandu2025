<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@stack('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template1/theme/assets/images/logoposyandu1.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('template1/theme/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('template1/theme/assets/css/preloader.min.css') }}" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('template1/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('template1/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('alert/css/sweetalert2.css') }} " rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

    @stack('css')
    <style>
        body {
            margin: 0;
            padding: 0;
        }
    </style>

</head>

<body data-topbar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('Template.header')

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                @include('Template.sidebar')
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="main-content">
            @yield('content')

            {{-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Posyandu.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by <a href="#!" class="text-decoration-underline">Tio Pratama</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <!-- END layout-wrapper -->



    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <script src="{{ asset('template1/theme/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('template1/theme/assets/libs/feather-icons/feather.min.js') }}"></script>

    <script src="{{ URL::to('alert/js/sweetalert.js') }}"></script>
    <script src="{{ URL::to('template1/theme/assets/js/pages/dashboard.init.js') }}"></script>
    <!-- App js -->
    <script src="{{ URL::to('template1/theme/assets/js/app.js') }}"></script>
    <!-- dashboard init -->
    @stack('scripts')

    <script>
        let userIP = '';

        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                userIP = data.ip;
            })
            .catch(error => console.error('Error fetching IP:', error));

    </script>
</body>

</html>
