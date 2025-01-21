@extends('Template.templateadmin')

@push('title')
POSYANDU | Input Data Remaja
@endpush

@push('css')
<!-- DataTables -->
<link href="{{ asset('template1/themelibs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('template1/themelibs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('template1/themelibs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
@endpush

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Tambah Data</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                <li class="breadcrumb-item active">Basic Elements</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Silahkan Tambah Data</h4>
                            <span style="float:right">
                                <a href="/admin/dataremaja" class="btn btn-danger">Kembali</a>
                            </span>
                        </div>
                        <div class="card-body p-4">

                            @include('Template.flashMessage')
                            <div class="row">
                                <form action="/admin/insert" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">NIK</label>
                                                <input class="form-control" name="nik" type="text" value=""
                                                    pattern="\d{16}" maxlength="16" onkeypress="return hanyaAngka(event)"
                                                    id="example-text-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Email</label>
                                                <input class="form-control" name="email" type="email" value=""
                                                    id="example-text-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Nama</label>
                                                <input class="form-control" name="Nama" type="text" value=""
                                                    onkeypress='return harusHuruf(event)' id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Tempat Lahir</label>
                                                <input class="form-control" name="TempatLahir" type="text"
                                                    onkeypress='return harusHuruf(event)' value=""
                                                    id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Tanggal Lahir</label>
                                                <input class="form-control" name="TanggalLahir" type="date"
                                                    value="" id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="JenisKelamin" aria-label="JenisKelamin">
                                                    <option selected>Jenis Kelamin</option>
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                {{-- <input class="form-control" name="JenisKelamin" type="text" value="" id="example-tel-input"> --}}
                                            </div>
                                            {{-- <div class="mb-3">
                                                            <label for="example-email-input" class="form-label">Berat Badan</label>
                                                            <input class="form-control" name="BB" type="text" value="" id="example-email-input">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="example-email-input" class="form-label">Tinggi Badan</label>
                                                            <input class="form-control" name="TB" type="text" value="" id="example-email-input">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-email-input" class="form-label">Tablet Tambah Darah</label>
                                                            <input class="form-control" name="TTD" type="text" value="" id="example-email-input">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-email-input" class="form-label">Lingkar Lengan Atas</label>
                                                            <input class="form-control" name="LILA" type="text" value="" id="example-email-input">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-email-input" class="form-label">Lingkar Perut</label>
                                                            <input class="form-control" name="LP" type="text" value="" id="example-email-input">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-email-input" class="form-label">Anemia</label>
                                                            <input class="form-control" name="Anemia" type="text" value="" id="example-email-input">
                                                        </div> --}}
                                            <span style="float:right">
                                                <button type="Submit" class="btn btn-success">Submit</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    {{-- <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    Posyandu.write(new Date().getFullYear())

                </script> © Admin.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Desain & Develop by <a href="#!" class="text-decoration-underline">Tio</a>
                </div>
            </div>
        </div>
    </div>
</footer> --}}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('template1/themelibs/jquery/jquery.min') }}"></script>
    <script src="{{ asset('template1/themelibs/bootstrap/js/bootstrap.bundle.min') }}"></script>
    <script src="{{ asset('template1/themelibs/metismenu/metisMenu.min') }}"></script>
    <script src="{{ asset('template1/themelibs/simplebar/simplebar.min') }}"></script>
    <script src="{{ asset('template1/themelibs/node-waves/waves.min') }}"></script>
    <script src="{{ asset('template1/themelibs/feather-icons/feather.min') }}"></script>
    <!-- pace js -->
    <script src="{{ asset('template1/themelibs/pace-js/pace.min') }}"></script>
    <script src="{{ asset('template1/themejs/app') }}"></script>
    <script>
        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function harusHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
                return false;
            return true;
        }
    </script>
@endpush
