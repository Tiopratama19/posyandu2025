<style>
    .navbar {
        background-color: #2ac0c0;
        border-bottom-left-radius: 50px;
        border-bottom-right-radius: 50px;
        padding: 10px 20px;
    }

    .logo-posyandu {
        height: 50px;
    }

    .navbar-nav .nav-link {
        color: white;
        margin-right: 15px;
        line-height: 50px;
    }

    .btn-outline-light {
        border-color: white;
        color: white;
    }

    .btn-outline-light:hover {
        background-color: white;
        color: #2ac0c0;
    }

    .navbar-toggler {
        border-color: white;
    }

    .navbar-toggler-icon {
        background-color: white;
    }

    /* Dropdown Styling */
    .dropdown-menu {
        min-width: 200px;
        background-color: #2ac0c0;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .dropdown-menu.show {
        opacity: 1;
        visibility: visible;
    }

    .dropdown-item {
        color: white;
        padding: 12px 16px;
        transition: background-color 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .dropdown-toggle::after {
        content: '\f0d7';
        /* Arrow down icon */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        padding-left: 5px;
    }

    .dropdown-toggle {
        color: white;
        font-size: 16px;
        font-weight: 600;
    }

    /* Responsif untuk ukuran layar kecil (di bawah 992px) */
    @media (max-width: 991px) {
        .navbar-nav {
            text-align: center;
            width: 100%;
        }

        .navbar-nav .nav-item {
            margin: 5px 0;
        }

        .dropdown-menu {
            left: auto;
            right: 0;
        }
    }

    /* Responsif untuk layar lebih kecil (di bawah 768px) */
    @media (max-width: 767px) {
        .navbar-nav .nav-item {
            font-size: 14px;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            padding: 10px 0;
        }

        .dropdown-menu {
            width: 100%;
        }

        .dropdown-toggle {
            width: 100%;
            text-align: left;
        }

        .container-fluid {
            padding-left: 10px;
            padding-right: 10px;
        }
    }
</style>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-flex align-items-center">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ url('/') }}/fe/logo/posyandu.png" alt="Logo Posyandu" class="logo-posyandu">
        </a>

        <!-- Navbar Toggler (Mobile) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#section_1">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="#section_2">Edukasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#section_3" id="nav_section3">Jadwal Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="#section_4">Informasi Anggota</a></li>
                <li class="nav-item"><a class="nav-link" href="#section_5" id="nav_section5">Dokumentasi Kegiatan</a>
                </li>
                <li class="nav-item"><a class="nav-link" href="#section_6">Tentang Kami</a></li>
                <li class="nav-item"><a class="nav-link" href="#section_7">Kontak</a></li>
            </ul>

            <!-- Tombol Masuk atau Dropdown -->
            @if (auth()->check() && auth()->user()->type === 'user')
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Halo, {{ auth()->user()->name }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ url('change-password') }}">Ganti Password <i
                                    class="bi bi-key"></i></a></li>
                        <li><a class="dropdown-item" href="{{ url('logout') }}">Logout <i
                                    class="bi bi-box-arrow-in-right"></i></a></li>
                    </ul>
                </div>
            @else
                <button id="loginButton" class="btn btn-outline-light">
                    Masuk <i class="bi bi-box-arrow-in-right"></i>
                </button>
            @endif

        </div>
    </div>
</nav>

<script>
    const dropdownToggle = document.getElementById('userDropdown');
    const dropdownMenu = dropdownToggle.nextElementSibling;

    dropdownToggle.addEventListener('click', function(event) {
        event.stopPropagation();
        dropdownMenu.classList.toggle('show');
    });

    document.addEventListener('click', function(event) {
        if (!dropdownToggle.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
</script>
