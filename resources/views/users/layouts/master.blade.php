<!doctype html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@stack('title')</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">

    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&amp;family=Open+Sans&amp;display=swap"
        rel="stylesheet">

    <link href="{{ url('/') }}/fe/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/') }}/fe/css/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ url('/') }}/fe/css/templatemo-topic-listing.css" rel="stylesheet">

    @stack('css')


    <link href="{{ asset('alert/css/sweetalert2.css') }} " rel="stylesheet" />
</head>

<body id="top">

    <main>
        @include('users.layouts.nav')

        @yield('content')
    </main>

    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="#">
                        <i class="bi-back"></i>
                        <span>Posyandu</span>
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <h6 class="site-footer-title mb-3">Sumber</h6>

                    <ul class="site-footer-links">
                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Beranda</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Edukasi</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Jadwal Konseling</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Informasi Anggota</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Informasi Kegiatan</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Tentang Kami</a>
                        </li>

                        <li class="site-footer-link-item">
                            <a href="#" class="site-footer-link">Kontak</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-6 mb-4 mb-lg-0">
                    <h6 class="site-footer-title mb-3">Informasi</h6>

                    <p class="text-white d-flex mb-1">
                        <a href="tel: 083894328358" class="site-footer-link">
                            083894328358
                        </a>
                    </p>

                    <p class="text-white d-flex">
                        <a href="mailto:posyandumentari@gmail.com" class="site-footer-link">
                            posyandumentari@gmail.com
                        </a>
                    </p>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-lg-0 ms-auto">
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            English</button>

                        <ul class="dropdown-menu">
                            <li><button class="dropdown-item" type="button">Thai</button></li>

                            <li><button class="dropdown-item" type="button">Myanmar</button></li>

                            <li><button class="dropdown-item" type="button">Arabic</button></li>
                        </ul>
                    </div> -->

                    <p class="copyright-text">Copyright © 2023 Posyandu Remaja.
                        <br><br>Desain: <a rel="nofollow" href="https://templatemo.com/" target="_blank">Tio M.P.B</a>
                    </p>

                </div>

            </div>
        </div>
    </footer>


    <!-- JAVASCRIPT FILES -->
    <script src="{{ url('/') }}/fe/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/fe/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/fe/js/jquery.sticky.js"></script>
    <script src="{{ url('/') }}/fe/js/click-scroll.js"></script>
    <script src="{{ url('/') }}/fe/js/custom.js"></script>

    @stack('js')

    <script src="{{ URL::to('alert/js/sweetalert.js') }}"></script>
    <script>
        const userRole = "{{ auth()->check() ? auth()->user()->type : 'guest' }}";

        if (userRole === 'user') {
            $('#nav_section3').show();
            $('#section_3').show();
            $('#nav_section5').show();
            $('#section_5').show();
        } else {
            $('#nav_section3').hide();
            $('#section_3').hide();
            $('#nav_section5').hide();
            $('#section_5').hide();
        }
        document.getElementById('loginButton').addEventListener('click', function() {
            let userIP = '';

            fetch('https://api.ipify.org?format=json')
                .then(response => response.json())
                .then(data => {
                    userIP = data.ip;
                })
                .catch(error => console.error('Error fetching IP:', error));


            Swal.fire({
                title: 'Pilih Jenis Login',
                text: 'Apakah Anda ingin login sebagai admin?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Admin',
                cancelButtonText: 'Bukan Admin',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Cek IP sebelum mengizinkan login admin
                    fetch(`/validate-admin-ip?ip=${userIP}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.isAllowed) {
                                Swal.fire({
                                    title: 'Login Admin',
                                    text: 'Anda memilih untuk login sebagai admin.',
                                    icon: 'success'
                                });
                                window.location.href = `{{ url('login') }}`;
                            } else {
                                Swal.fire({
                                    title: 'Akses Ditolak',
                                    text: 'Anda tidak memiliki izin untuk mengakses login admin.',
                                    icon: 'error'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat memvalidasi IP.',
                                icon: 'error'
                            });
                            console.error('Error:', error);
                        });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Login Pengguna',
                        text: 'Anda memilih untuk login sebagai pengguna biasa.',
                        icon: 'info'
                    });
                    window.location.href = `{{ url('/login/user') }}`;
                }
            });
        });
    </script>
</body>

</html>
