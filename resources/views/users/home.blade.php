<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    .hero-section {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        /* Membatasi tinggi section dengan tinggi layar */
        text-align: center;
        background: linear-gradient(270deg, #00c6ff, #0072ff);
        background-size: 400% 400%;
        animation: gradientAnimation 10s ease infinite;
        color: white;
        position: relative;
    }

    h1,
    h6 {
        margin: 0;
        opacity: 0;
        animation-fill-mode: forwards;
        animation-duration: 1.5s;
    }

    h1 {
        font-size: 3em;
        font-weight: 600;
        animation: fadeInDown 1.5s ease-in-out forwards, textColorChange 10s ease infinite;
    }

    h6 {
        font-size: 1.2em;
        font-weight: 400;
        margin-top: 20px;
        animation: fadeInUp 1.5s ease-in-out forwards, textColorChange 10s ease infinite;
        animation-delay: 0.5s;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Animasi perubahan warna teks antara putih dan hitam */
    @keyframes textColorChange {

        0%,
        100% {
            color: white;
        }

        50% {
            color: black;
        }
    }

    /* Mobile responsive adjustments */
    @media (max-width: 768px) {
        .hero-section {
            padding: 20px;
            /* Menambahkan padding pada mobile */
        }

        h1 {
            font-size: 2.5em;
            /* Mengurangi ukuran font pada mobile */
        }

        h6 {
            font-size: 1.1em;
        }
    }

</style>

<section class="hero-section" id="section_1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <h1>Selamat Datang Di Website Posyandu Remaja</h1>
                <h6>Sebuah platform edukasi untuk masyarakat Kampung Cupu</h6>
            </div>
        </div>
    </div>
</section>


<section class="featured-section">
    <div class="container">
        <div class="row justify-content-center">

            {{-- <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                <div class="custom-block bg-white shadow-lg">
                    <a href="/admin/Template/users/edukasi/bahayarokok">
                        <div class="d-flex">
                            <div>
                                <h5 class="mb-2">Web Design</h5>

                                <p class="mb-0">When you search for free CSS templates, you will notice that
                                    TemplateMo is one of the best websites.</p>
                            </div> --}}

            {{-- <span class="badge bg-design rounded-pill ms-auto">14</span> --}}
            {{-- </div>

                        <img src="{{url('/')}}/fe/images/topics/undraw_Remote_design_team_re_urdx.png"
            class="custom-block-image img-fluid" alt="">
            </a>
        </div>
    </div> --}}

    {{-- <div class="col-lg-6 col-12"> --}}
    {{-- <div class="custom-block custom-block-overlay">
                    <div class="d-flex flex-column h-100">
                        <img src="{{url('/')}}/fe/images/businesswoman-using-tablet-analysis.jpg"
    class="custom-block-image img-fluid" alt=""> --}}

    {{-- <div class="custom-block-overlay-text d-flex">
                            <div>
                                <h5 class="text-white mb-2">Finance</h5>

                                <p class="text-white">Topic Listing Template includes homepage, listing page,
                                    detail page, and contact page. You can feel free to edit and adapt for your
                                    CMS requirements.</p>

                                <a href="topics-detail.html" class="btn custom-btn mt-2 mt-lg-3">Learn More</a>
                            </div>

                            {{-- <span class="badge bg-finance rounded-pill ms-auto">25</span> --}}
    {{-- </div> --}}

    {{-- <div class="social-share d-flex">
                            <p class="text-white me-4">Share:</p>

                            <ul class="social-icon">
                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-twitter"></a>
                                </li>

                                <li class="social-icon-item">
                                    <a href="#" class="social-icon-link bi-facebook"></a>
                                </li></a>
                        </div> --}}

    <div class="section-overlay"></div>
    </div>
    </div>
    </div>

    </div>
    </div>
</section>
