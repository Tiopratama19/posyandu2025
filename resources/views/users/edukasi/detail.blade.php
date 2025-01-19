<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Topic Detail Page</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="{{ url('/') }}/fe/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ url('/') }}/fe/css/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ url('/') }}/fe/css/templatemo-topic-listing.css" rel="stylesheet">
    <!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
</head>

<body id="top">

    <main>

        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ url('/') }}/fe/logo/posyandu.png"
                        style="max-width: 100%;
                    height: 100px; filter: contrast(300%);"
                        alt="">
                </a>

                <div class="d-lg-none ms-auto me-4">
                    <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/') }}/#section_1">Beranda</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/') }}/#section_2">Edukasi</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/') }}/#section_3">Jadwal Konseling</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/') }}/#section_4">Informasi Anggota</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/') }}/#section_5">Informasi
                                Kegiatan</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/') }}/#section_6">Tentang Kami</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ url('/') }}/#section_7">Kontak</a>
                        </li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#section_5" id="navbarLightDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="topics-listing.html">Topics Listing</a></li>

                                <li><a class="dropdown-item" href="contact.html">Contact Form</a></li>
                            </ul>
                        </li> --}}
                    </ul>

                    <div class="d-none d-lg-block">
                        <a href="{{ url('login') }}"><button class="btn btn-outline-light"
                                style="filter: contrast(100%);">Masuk <i
                                    class="bi bi-box-arrow-in-right"></i></button></a>
                    </div>
                </div>
            </div>
        </nav>


        <header class="site-header d-flex flex-column justify-content-center align-items-center">
            <div class="container">
                <div class="row justify-content-center align-items-center">

                    <div class="col-lg-5 col-12 mb-5">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                {{-- <li class="breadcrumb-item"><a href="">Kenapa Rokok Berbahaya</a></li> --}}

                                <li class="breadcrumb-item active" aria-current="page">Kandungan rokok yang paling
                                    sering disinggung adalah nikotin yang memiliki efek candu.
                                    Nikotin berfungsi sebagai perantara dalam sistem saraf otak yang menyebabkan
                                    berbagai
                                    reaksi,
                                    termasuk efek menyenangkan dan menenangkan.
                                    Nikotin yang dihisap perokok akan terserap masuk ke aliran darah,
                                    kemudian merangsang tubuh untuk memproduksi lebih banyak hormon adrenalin,
                                    sehingga menyebabkan peningkatan tekanan darah, denyut jantung, dan pernapasan.</li>
                            </ol>
                        </nav>
                        <h2 class="text-white">Introduction to <br> Web Design 101</h2>
                        <div class="d-flex align-items-center mt-5">
                            <a href="#topics-detail" class="btn custom-btn custom-border-btn smoothscroll me-4"></a>
                            <a href="#top" class="custom-icon bi-bookmark smoothscroll"></a>
                        </div>
                    </div>

                    <div class="col-lg-5 col-12">
                        <div class="topics-detail-block bg-white shadow-lg">
                            <img src="images/public/edukasikegiatan/1720712688-668ffdf0111e2.jpg"
                                class="topics-detail-block-image img-fluid">
                        </div>
                    </div>

                </div>
            </div>
        </header>


        {{-- <section class="topics-detail-section section-padding" id="topics-detail">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 m-auto">
                        <h3 class="mb-4">{{ $prokerposyandu->Nama }}</h3>

                        <p>{!! html_entity_decode($prokerposyandu->Caption) !!}.</p>

                        <div class="row my-4">
                            <div class="col-lg-6 col-md-6 col-12">
                                <img src="images/businesswoman-using-tablet-analysis.jpg"
                                    class="topics-detail-block-image img-fluid">
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                                <img src="images/colleagues-working-cozy-office-medium-shot.jpg"
                                    class="topics-detail-block-image img-fluid">
                            </div>
                        </div>

                        <p>Most people start with freelancing skills they already have as a side hustle to build up
                            income. This extra cash can be used for a vacation, to boost up savings, investing, build
                            business.</p>
                    </div>

                </div>
            </div>
        </section> --}}

        {{-- 
        <section class="section-padding section-bg">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-5 col-12">
                        <img src="images/rear-view-young-college-student.jpg" class="newsletter-image img-fluid"
                            alt="">
                    </div>

                    <div class="col-lg-5 col-12 subscribe-form-wrap d-flex justify-content-center align-items-center">
                        <form class="custom-form subscribe-form" action="#" method="post" role="form">
                            <h4 class="mb-4 pb-2">Get Newsletter</h4>

                            <input type="email" name="subscribe-email" id="subscribe-email"
                                pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address"
                                required="">

                            <div class="col-lg-12 col-12">
                                <button type="submit" class="form-control">Subscribe</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section> --}}
    </main>
    <footer class="site-footer section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-12 mb-4 pb-2">
                    <a class="navbar-brand mb-2" href="index.html">
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
                            <a href="#" class="site-footer-link">Informasi Kader</a>
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
                        <br><br>Desain: <a rel="nofollow" href="https://templatemo.com/" target="_blank">Tio
                            M.P.B</a>
                    </p>

                </div>

            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="{{ url('/') }}/fe/js/jquery.min.js"></script>
    <script src="{{ url('/') }}/fe/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/fe/js/jquery.sticky.js"></script>
    <script src="{{ url('/') }}/fe/js/custom.js"></script>

</body>

</html>
