@extends('Template.templateadmin')
@section('content')
    @push('title')
        POSYANDU | Form Anggota Kader
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

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $form['title'] }}</h4>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Form {{ $form['title'] }}</h4>

                                <span style="float:right">
                                    <a href="{{ route('informasi.index') }}" class="btn btn-danger">Kembali</a>
                                </span>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <form method="POST" action="{{ $form['action'] }}" enctype="multipart/form-data">
                                    @csrf
                                    @method($form['method'])
                                    <div class="col-lg-12">
                                        <div>

                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Judul</label>
                                                <input class="form-control" name="judul" type="text"
                                                    value="{{ old('judul', $item->judul ?? '') }}"
                                                    id="example-search-input">
                                            </div>


                                            <div class="mb-3">
                                                {{-- <label for="example-search-input" class="form-label">Jenis</label> --}}
                                                <input class="form-control" name="jenis" type="hidden" value="edukasi"
                                                    id="example-search-input">
                                            </div>

                                            <div class="mb-3">
                                                <label for="kategori" class="form-label">Kategori</label>
                                                <select name="kategori_id" id="kategori" class="form-select">
                                                    <option value="">Pilih Kategori</option>
                                                    @foreach ($form['kategori'] as $d)
                                                        <option value="{{ $d->id }}" data-jenis="{{ $d->jenis }}"
                                                            @selected($d->id == ($item->kategori_id ?? ''))>
                                                            {{ $d->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal Mulai</label>
                                                <input class="form-control" name="start_date" type="date"
                                                    value="{{ old('start_date', $item->start_date ?? '') }}"
                                                    id="example-text-input">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal Selesai</label>
                                                <input class="form-control" name="end_date" type="date"
                                                    value="{{ old('end_date', $item->end_date ?? '') }}"
                                                    id="example-text-input">
                                            </div> --}}
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="deskripsi" placeholder="Enter the deskripsi" rows="5" name="deskripsi">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                @if (isset($item->galeri))
                                                    <img src="{{ asset('storage/' . $item->galeri) }}" width="200"
                                                        height="200" class="image_preview">
                                                @else
                                                    <img src="{{ asset('1200px-No_Preview_image_2.png') }}" width="200"
                                                        height="200" class="image_preview">
                                                @endif

                                                <div class="form-group mt-3">
                                                    <input class="form-control" type="file" name="galeri"
                                                        id="image">
                                                </div>
                                            </div>
                                            <span style="float:right">
                                                <button type="submit" class="btn btn-success">Submit</button>
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

        function filterOptions() {
            var selectedJenis = document.getElementById("jenis").value;
            var kategoriSelect = document.getElementById("kategori");

            // Loop through options and show/hide based on the selected "jenis"
            for (var i = 0; i < kategoriSelect.options.length; i++) {
                var option = kategoriSelect.options[i];
                if (option.getAttribute("data-jenis") === selectedJenis || option.value === "") {
                    option.style.display = "";
                } else {
                    option.style.display = "none";
                }
            }

            // Reset the selection if the selected option is hidden
            kategoriSelect.value = "";
        }



        window.onload = function() {
            const jenisSelect = document.getElementById('jenis');
            if (!jenisSelect.value) {
                jenisSelect.value = 'edukasi'; // Menetapkan 'edukasi' sebagai default jika belum dipilih
            }
        }
    </script>
@endpush
