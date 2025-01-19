<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>Login | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('template1/theme/assets/images/logoposyandu1.png') }}">

        <!-- preloader css -->
        <link rel="stylesheet" href="{{ asset('template1/theme/assets/css/preloader.min.css') }}" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="{{ asset('template1/theme/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('template1/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('template1/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="{{ asset('template1/theme/assets/images/logoposyandu1.png') }}" alt="" height="28"> <span class="logo-txt">Posyandu Mentari</span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Selamat Datang Kembali Admin</h5>
                                            <p class="text-muted mt-2">Masuk Untuk Jadi Admin.</p>
                                        </div>
                                        <form class="mt-4 pt-2" action="{{ url('/postLogin') }}" method="post">
                                            @csrf
                                            <div class="form-floating form-floating-custom mb-4">
                                                <input type="email" name="email" class="form-control" id="input-username" placeholder="Enter Email">
                                                <label for="input-username">email</label>
                                                <div class="form-floating-icon">
                                                <i data-feather="users"></i>
                                                </div>
                                            </div>

                                            <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
                                                <input type="password" name="password" class="form-control pe-5" id="password-input" placeholder="Enter Password">

                                                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                                                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                                                </button>
                                                <label for="input-password">Password</label>
                                                <div class="form-floating-icon">
                                                    <i data-feather="lock"></i>
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col">
                                                    <div class="form-check font-size-15">
                                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                                        <label class="form-check-label font-size-13" for="remember-check">
                                                            Ingatkan Saya
                                                        </label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="userip" id="userip">
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> Posyandu . Crafted with <i class="mdi mdi-heart text-danger"></i> by Tio</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay"></div>
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-end">
                                <div class="col-xl-7">
                                    <div class="p-0 p-sm-4 px-xl-0">
                                        <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators auth-carousel carousel-indicators-rounded justify-content-center mb-0">
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                                    <img src="{{ asset('template1/theme/assets/images/users/avatar-1.jpg' ) }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                                </button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2">
                                                    <img src="{{ asset('template1/theme/assets/images/users/avatar-2.jpg' ) }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                                </button>
                                                <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3">
                                                    <img src="{{ asset('template1/theme/assets/images/users/avatar-3.jpg' ) }}" class="avatar-md img-fluid rounded-circle d-block" alt="...">
                                                </button>
                                            </div>
                                         
                                        </div>
                                        <!-- end review carousel -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>


        <!-- JAVASCRIPT -->
        <script src="{{ asset('template1/theme/assets/libs/jquery/jquery.min.js' ) }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/bootstrap/js/bootstrap.bundle.min.js' ) }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/metismenu/metisMenu.min.js' ) }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/simplebar/simplebar.min.js' ) }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/node-waves/waves.min.js' ) }}"></script>
        <script src="{{ asset('template1/theme/assets/libs/feather-icons/feather.min.js' ) }}"></script>
        <!-- pace js -->
        <script src="{{ asset('template1/theme/assets/libs/pace-js/pace.min.js' ) }}"></script>

        <script src="{{ asset('template1/theme/assets/js/pages/pass-addon.init.js' ) }}"></script>

        <script src="{{ asset('template1/theme/assets/js/pages/feather-icon.init.js' ) }}"></script>

        <script>
            let userIP = '';
            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => {
                    userIP = data.ip;
                    $('#userip').val(userIP);
                })
                .catch(error => console.error('Error fetching IP:', error));

        </script>
    </body>


</html>
