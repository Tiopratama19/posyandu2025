@extends('Template.templateadmin')

@push('title')
    POSYANDU | Edit Proker Posyandu
@endpush

@push('css')
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
                                <a href="/admin/prokerposyandu" class="btn btn-danger">Kembali</a>
                            </span>
                        </div>
                        <div class="card-body p-4">

                            <div class="row">
                                <form id="editproker" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="example-tel-input" class="form-label">Tipe</label>
                                            <select class="form-select" name="Status" aria-label="JenisKelamin"
                                                onchange="handleSelectChange(event)">
                                                <option selected>Pilih Salah Satu</option>
                                                @if ($data->Status == 'Proker')
                                                    <option value="Proker" selected>Kegiatan</option>
                                                    <option value="Edukasi">Edukasi</option>
                                                @elseif($data->Status == 'Edukasi')
                                                    <option value="Proker">Kegiatan</option>
                                                    <option value="Edukasi" selected>Edukasi</option>
                                                @endif
                                            </select>
                                            {{-- <input class="form-control" name="JenisKelamin" type="text" value="" id="example-tel-input"> --}}
                                        </div>
                                        <div class="">
                                            <input type="hidden" name="id" value="{{ $data->id }}" id="id">
                                        </div>
                                        <div class="mb-3" id="nama">
                                            <label for="example-text-input" class="form-label">Edukasi</label>
                                            <input class="form-control" value="{{ $data->Nama }}" name="Nama"
                                                type="text" value="" id="example-text-input">
                                        </div>

                                        <div class="mb-3" id="kegiatan">
                                            <label for="example-text-input" class="form-label">Kegiatan</label>
                                            <input class="form-control" name="Kegiatan" value="{{ $data->Kegiatan }}"
                                                type="text" value="" id="example-text-input">
                                        </div>
                                        <div class="mb-3" id="tanggal">
                                            <label for="example-text-input" class="form-label">Tanggal</label>
                                            <input class="form-control" name="Tanggal" value="{{ $data->Tanggal }}"
                                                type="date" value="" id="example-text-input">
                                        </div>
                                        <div class="mb-3" id="StatusLandingKegiatan">
                                            <label for="example-tel-input" class="form-label">Jenis Kegiatan</label>
                                            <select class="form-select" name="jenis_edukasi_kegiatan">
                                                <option value="">Pilih Salah Satu</option>
                                                <option value="Penyuluhan" {{ 'Penyuluhan' == $data->StatusKegiatan ? 'selected' : '' }}>Penyuluhan</option>
                                                <option value="Pembinaan Mental" {{ 'Pembinaan Mental' == $data->StatusKegiatan ? 'selected' : '' }}>Pembinaan Mental</option>
                                                <option value="Pemeriksaan Kesehatan" {{ 'Pemeriksaan Kesehatan' == $data->StatusKegiatan ? 'selected' : '' }}>Pemeriksaan Kesehatan</option>
                                                <option value="Kunjungan Ke Rumah" {{ 'Kunjungan Ke Rumah' == $data->StatusKegiatan ? 'selected' : '' }}>Kunjungan Ke Rumah</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" id="StatusLanding">
                                            <label for="example-tel-input" class="form-label">Jenis Edukasi</label>
                                            <select class="form-select" name="jenis_edukasi" aria-label="JenisKelamin">
                                                <option value="">Pilih Salah Satu</option>
                                                <option value="Bahaya Rokok"
                                                    {{ 'Bahaya Rokok' == $data->StatusLanding ? 'selected' : '' }}>Bahaya
                                                    Rokok</option>
                                                <option value="Bahaya Narkoba"
                                                    {{ 'Bahaya Narkoba' == $data->StatusLanding ? 'selected' : '' }}>
                                                    Bahaya Narkoba</option>
                                                <option value="Stunting"
                                                    {{ 'Stunting' == $data->StatusLanding ? 'selected' : '' }}>Stunting
                                                </option>
                                                <option value="Bahaya Seks Bebas"
                                                    {{ 'Bahaya Seks Bebas' == $data->StatusLanding ? 'selected' : '' }}>
                                                    Bahaya Seks Bebas</option>
                                                <option value="Kesehatan Reproduksi"
                                                    {{ 'Kesehatan Reproduksi' == $data->StatusLanding ? 'selected' : '' }}>
                                                    Kesehatan Reproduksi</option>

                                            </select>
                                            {{-- <input class="form-control" name="JenisKelamin" type="text" value="" id="example-tel-input"> --}}
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-text-input" class="form-label">Caption</label>
                                            <textarea class="form-control" id="Caption" placeholder="Enter the Caption" rows="5" name="Caption"> {{ $data->Caption }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <img src="{{ url('edukasikegiatan', $data->image) }}" width="200"
                                                height="200" class="image_preview">

                                            <div class="form-group mt-3">
                                                <input class="form-control" type="file"
                                                    value="{{ url('edukasikegiatan', $data->image) }}" name="image"
                                                    id="image">
                                            </div>
                                        </div>
                                        <br>
                                        <button style="float: right;" type="Submit"
                                            class="btn btn-success">Submit</button>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    @include('admin.js.image-upload-js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



        });
    </script>
    <script>
        var status = `{{ $data->Status }}`;
        if (status == 'Proker') {
            $("#nama").hide();
            $("#tanggal").show();
            $("#kegiatan").show();
            $("#StatusLanding").hide();
            $("#StatusLandingKegiatan").show();

        } else if (status == 'Edukasi') {
            $("#nama").show();
            $("#tanggal").hide();
            $("#kegiatan").hide();
            $("#StatusLanding").show();
            $("#StatusLandingKegiatan").hide();
        }

        function handleSelectChange(event) {
            // Ambil nilai yang dipilih
            var selectedValue = event.target.value;
            // Lakukan sesuatu dengan nilai yang dipilih
            if (selectedValue == 'Proker') {
                $("#nama").hide();
                $("#tanggal").show();
                $("#kegiatan").show();
                $("#StatusLanding").hide();
            } else if (selectedValue == 'Edukasi') {
                $("#nama").show();
                $("#tanggal").hide();
                $("#kegiatan").hide();
                $("#StatusLanding").show();
            }
        }

        ClassicEditor
            .create(document.querySelector('#Caption'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
