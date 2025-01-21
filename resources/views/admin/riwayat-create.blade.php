@extends('Template.templateadmin')
@push('title')
    POSYANDU | Data Riwayat Remaja
@endpush

@push('css')
    <!-- DataTables -->
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">
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
                                <li class="breadcrumb-item">Detail {{ $dataremaja->Nama }}</li>
                                <li class="breadcrumb-item active">Tambah Data</li>
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
                            <h4 class="card-title">Tambah Detail <b>{{ $dataremaja->Nama }}</b></h4>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('riwayatdetail', $dataremaja->id) }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <form class="col-12 col-lg-12"
                                    action="{{ route('dataremaja.riwayat-store', $dataremaja->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label">Tanggal</label>
                                        <input id="tanggal"
                                            class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : '' }}"
                                            name="tanggal" type="date" value="{{ old('tanggal') }}">
                                        @error('tanggal')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="bb" class="form-label">BB</label>
                                        <input id="bb"
                                            class="form-control {{ $errors->has('bb') ? 'is-invalid' : '' }}"
                                            name="bb" type="number" value="{{ old('bb') }}">
                                        @error('bb')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="tb" class="form-label">TB</label>
                                        <input id="tb"
                                            class="form-control {{ $errors->has('tb') ? 'is-invalid' : '' }}"
                                            name="tb" type="number" value="{{ old('tb') }}">
                                        @error('tb')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="ttd" class="form-label">Tensi</label>
                                        <input id="ttd"
                                            class="form-control {{ $errors->has('ttd') ? 'is-invalid' : '' }}"
                                            name="ttd" type="text" value="{{ old('ttd') }}">
                                        @error('ttd')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="lila" class="form-label">LILA</label>
                                        <input id="lila"
                                            class="form-control {{ $errors->has('lila') ? 'is-invalid' : '' }}"
                                            name="lila" type="text" value="{{ old('lila') }}">
                                        @error('lila')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="lp" class="form-label">LP</label>
                                        <input id="lp"
                                            class="form-control {{ $errors->has('lp') ? 'is-invalid' : '' }}"
                                            name="lp" type="text" value="{{ old('lp') }}">
                                        @error('lp')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="anemia" class="form-label">Keluhan</label>
                                        <input id="anemia"
                                            class="form-control {{ $errors->has('anemia') ? 'is-invalid' : '' }}"
                                            name="anemia" type="text" value="{{ old('anemia') }}">
                                        @error('anemia')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 d-flex justify-content-end">
                                        <button type="Submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div> <!-- container-fluid -->
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
    <!-- Required datatable js -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/template1/theme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <!-- Responsive examples -->
    <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>

    <!-- Datatable init js -->
    <script src="{{ asset('template1/theme/assets/js/pages/datatables.init.js') }}"></script>
@endpush
