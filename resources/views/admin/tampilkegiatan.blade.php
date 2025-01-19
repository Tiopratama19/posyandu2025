@extends('Template.templateadmin')
@section('content')
    @push('title')
        POSYANDU | Edit Anggota
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
                        <h4 class="mb-sm-0 font-size-18">Edit Anggota</h4>
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
                            <h4 class="card-title">Silahkan Edit Anggota</h4>
                            <p class="card-title-desc">Here are examples of <code>.form-control</code> applied to each
                                textual HTML5 <code>&lt;input&gt;</code> <code>type</code>.</p>
                            <span style="float:right">
                                <a href="/admin/kegiatankader" class="btn btn-danger">Kembali</a>
                            </span>
                        </div>
                        <div class="card-body p-4">

                            <div class="row">
                                <form id="updatekegiatan" method="POST">
                                    @csrf
                                    <div class="col-lg-12">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal Bergabung</label>
                                                <input class="form-control" name="Tanggal" type="date"
                                                    value="{{ $data->TanggalBergabung }}" id="example-email-input">
                                            </div>
                                            <div class="">
                                                <input type="hidden" name="id" value="{{ $data->id }}"
                                                    id="id">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Nama</label>
                                                <input class="form-control" name="Nama" type="text"
                                                    value="{{ $data->Nama }}" id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Jabatan</label>
                                                <input class="form-control" name="Jabatan" type="text"
                                                    value="{{ $data->Jabatan }}" id="example-search-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Caption</label>
                                                <textarea class="form-control" id="Caption" placeholder="Enter the Caption" rows="5" name="caption"> {{ $data->caption }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <img src="{{ url('kader', $data->image) }}" width="200" height="200"
                                                    class="image_preview">

                                                <div class="form-group mt-3">
                                                    <input class="form-control" type="file"
                                                        value="{{ url('kader', $data->image) }}" name="image"
                                                        id="image">
                                                </div>
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

@push('scripts')
    @include('admin.js.image-upload-js')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
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
