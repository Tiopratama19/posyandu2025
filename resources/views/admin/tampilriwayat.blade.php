@extends('Template.templateadmin')
@section('content')
    @push('title')
        POSYANDU | Edit Data Riwayat
    @endpush

    @push('css')
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
                            <h4 class="card-title">Silahkan Edit Riwayat</h4>
                            <span style="float:right">
                                <a href="/admin/riwayat" class="btn btn-danger">Kembali</a>
                            </span>
                        </div>
                        <div class="card-body p-4">

                            <div class="row">
                                <form action="/admin/updateriwayat/{{ $data->id }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12">

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Tanggal</label>
                                                <input class="form-control" name="Tanggal" type="date"
                                                    value="{{ $data->Tanggal }}" id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Berat Badan</label>
                                                <input class="form-control" name="BB" type="text" maxlength="3"
                                                    onkeypress="return hanyaAngka(event)" value="{{ $data->BB }}"
                                                    id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Tinggi Badan</label>
                                                <input class="form-control" name="TB" type="text" maxlength="3"
                                                    onkeypress="return hanyaAngka(event)" value="{{ $data->TB }}"
                                                    id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Tablet Tambah
                                                    Darah</label>
                                                <select class="form-select" name="TTD" aria-label="TTD">
                                                    <option selected>Tablet Tambah Darah</option>
                                                    <option value="Udah">Udah</option>
                                                    <option value="Belum">Belum</option>
                                                </select>
                                                {{-- <input class="form-control" name="TTD" type="text" value="{{$data->TTD}}"
                                            id="example-email-input"> --}}
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Lingkar Lengan
                                                    Atas</label>
                                                <input class="form-control" name="LILA" type="text" maxlength="3"
                                                    onkeypress="return hanyaAngka(event)" value="{{ $data->LILA }}"
                                                    id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">Lingkar Perut</label>
                                                <input class="form-control" name="LP" type="text" maxlength="3"
                                                    onkeypress="return hanyaAngka(event)" value="{{ $data->LP }}"
                                                    id="example-email-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="anemia" class="form-label">RIWAYAT PENYAKIT</label>
                                                <input id="anemia" class="form-control" name="anemia" type="text" value="{{ $data->Anemia }}">
                                              
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
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
