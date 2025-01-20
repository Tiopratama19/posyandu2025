<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" data-key="t-menu">Menu</li>

        <li>
            <a href="{{ url('admin/dashboard') }}">
                <i data-feather="home"></i>
                <span data-key="t-dashboard">Beranda</span>
            </a>
        </li>

        <li>
            <a href="{{ url('admin/jadwalkonseling') }}">
                <i data-feather="calendar"></i>
                <span data-key="t-calendar">Jadwal Kegiatan</span>
            </a>
        </li>

        <li>
            <a href="{{ url('admin/dataremaja') }}">
                <i data-feather="users"></i>
                <span data-key="t-tables">Data Remaja</span>
            </a>
        </li>

        <li>
            <a href="{{ route('informasi.index') }}">
                <i data-feather="trello"></i>
                <span data-key="t-tables">Edukasi</span>
            </a>
        </li>

        <li>
            <a href="{{ route('anggota.index') }}">
                <i data-feather="sliders"></i>
                <span data-key="t-tables">Kelola Anggota</span>
            </a>
        </li>

    </ul>
</div>
