<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ url('/') }}/fe/logo/posyandu.png"
                style="max-width: 100%;
            height: 100px; filter: contrast(300%);" alt="">
        </a>

        <div class="d-lg-none ms-auto me-4">
            <a href="#top" class="navbar-icon bi-person smoothscroll"></a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-lg-5 me-lg-auto ">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_1">Beranda </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_2">Edukasi</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Jadwal Kegiatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Informasi Anggota</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_5">Informasi Kegiatan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_6">Tentang Kami</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_7">Kontak</a>
                </li>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">Pages</a>

                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                        <li><a class="dropdown-item" href="topics-listing.html">Topics Listing</a></li>

                        <li><a class="dropdown-item" href="contact.html">Contact Form</a></li>
                    </ul>
                </li> --}}
            </ul>

            <div class="d-none d-lg-block">
                <a href="{{ url('login') }}"><button class="btn btn-outline-light"
                        style="filter: contrast(100%);">Masuk <i class="bi bi-box-arrow-in-right"></i></button></a>
            </div>
        </div>
    </div>
</nav>
