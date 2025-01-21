@extends('Template.templateadmin')
@push('title')
    POSYANDU | Input Data Remaja
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

@section('content')
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
                            <h4 class="card-title">Silahkan Edit Data</h4>

                            <span style="float:right">
                                <a href="/admin/dataremaja" class="btn btn-danger">Kembali</a>
                            </span>
                        </div>
                        <div class="card-body p-4">

                            <div class="row">
                                <form action="/admin/updatedata/{{ $data->id }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">NIK</label>
                                                <input class="form-control" name="nik" type="text" pattern="\d{16}"
                                                    value="{{ $data->nik }}" id="example-text-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Email</label>
                                                <input class="form-control" name="email" type="email" value=""
                                                    id="example-text-input"  value="{{ $data->email }}" >
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Nama</label>
                                                <input class="form-control" name="Nama" type="text"
                                                    value="{{ $data->Nama }}" id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Tempat Lahir</label>
                                                <input class="form-control" name="TempatLahir" type="text"
                                                    value="{{ $data->TempatLahir }}" id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Tanggal Lahir</label>
                                                <input class="form-control" name="TanggalLahir" type="date"
                                                    value="{{ $data->TanggalLahir }}" id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">Jenis Kelamin</label>
                                                <select class="form-select" name="JenisKelamin" aria-label="JenisKelamin">
                                                    @if ($data->JenisKelamin == 'Laki-laki')
                                                        <option selected value="Laki-laki"> Laki-laki</option>
                                                        <option value="Perempuan"> Perempuan</option>
                                                    @elseif($data->JenisKelamin == 'Perempuan')
                                                        <option value="Laki-laki"> Laki-laki</option>
                                                        <option selected value="Perempuan"> Perempuan</option>
                                                    @endif
                                                </select>
                                                {{-- <input class="form-control" name="JenisKelamin" type="text" value="{{$data->JenisKelamin}}"
                                            id="example-tel-input"> --}}
                                            </div>
                                            {{-- <div class="mb-3">
                                                            <label for="example-email-input" class="form-label">Berat Badan</label>
                                                            <input class="form-control" name="BB" type="text" value="{{$data->BB}}"
                                        id="example-email-input">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="example-email-input" class="form-label">Tinggi Badan</label>
                                        <input class="form-control" name="TB" type="text" value="{{$data->TB}}"
                                            id="example-email-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email-input" class="form-label">Tablet Tambah Darah</label>
                                        <input class="form-control" name="TTD" type="text" value="{{$data->TTD}}"
                                            id="example-email-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email-input" class="form-label">Lingkar Lengan Atas</label>
                                        <input class="form-control" name="LILA" type="text" value="{{$data->LILA}}"
                                            id="example-email-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email-input" class="form-label">Lingkar Perut</label>
                                        <input class="form-control" name="LP" type="text" value="{{$data->LP}}"
                                            id="example-email-input">
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email-input" class="form-label">Anemia</label>
                                        <input class="form-control" name="Anemia" type="text" value="{{$data->Anemia}}"
                                            id="example-email-input">
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

    </div>
@endsection
