@extends('Template.templateadmin')
@section('content')
    @push('title')
        POSYANDU | Edit Jadwal
    @endpush

    @push('css')
        <!-- DataTables -->
        <!-- <link href="{{ asset('template1/themelibs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
                                rel="stylesheet" type="text/css" />
                            <link href="{{ asset('template1/themelibs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
                                rel="stylesheet" type="text/css" /> -->
        <!-- Responsive datatable examples -->
        <!-- <link href="{{ asset('template1/themelibs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
                                rel="stylesheet" type="text/css" /> -->
    @endpush

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Data</h4>
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
                            <h4 class="card-title">Silahkan Edit Jadwal</h4>
                            <span style="float:right">
                                <a href="/admin/jadwalkonseling" class="btn btn-danger">Kembali</a>
                            </span>
                        </div>
                        <div class="card-body p-4">

                            <div class="row">
                                <form action="/admin/updatejadwal/{{ $data->id }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal Kegiatan</label>
                                                <input class="form-control" name="TanggalKegiatan" type="date"
                                                    value="{{ $data->TanggalKegiatan }}" id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Nama Kegiatan</label>
                                                <input class="form-control" name="NamaKegiatan" type="text"
                                                    value="{{ $data->NamaKegiatan }}" id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Nama Petugas
                                                    Kesehatan</label>
                                                <input class="form-control" name="NamaBidan" type="text"
                                                    value="{{ $data->NamaBidan }}" id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label>
                                                    <input type="checkbox" name="allow_extra" value="1">
                                                    Tambah jadwal ekstra bulan ini
                                                </label>
                                            </div>
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
@endsection
