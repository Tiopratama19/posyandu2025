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
                        <h4 class="mb-sm-0 font-size-18">Data Riwayat</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                <li class="breadcrumb-item active">Jumlah Riwayat</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Data Riwayat {{ $dataremaja->Nama }}</h4>
                                <p class="card-title-desc">Pastikan data yang dimasukkan itu sudah tepat dan benar.</p>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('dataremaja.riwayat-create', $dataremaja->id) }}"
                                        class="btn btn-primary">Tambah Data</a>
                                    <a href="/admin/dataremaja" class="btn btn-danger">Kembali</a>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }};
                                </div>
                            @endif
                            <div class="card-body">
                                <table id="datatable" class="table table-striped dt-responsive nowrap w-100 display nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>BB</th>
                                            <th>TB</th>
                                            <th>Tensi</th>
                                            <th>LILA</th>
                                            <th>LP</th>
                                            <th>Riwayat Penyakit</th>
                                            <th width="230px">Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $index => $row)
                                        <tr>
                                            <td scope="row">{{ $index + 1 }}</td>
                                            <td>{{ $row->Tanggal }}</td>
                                            <td>{{ $row->BB }} kg</td>
                                            <td>{{ $row->TB }} cm</td>
                                            <td>{{ $row->TTD }}</td>
                                            <td>{{ $row->LILA }} cm</td>
                                            <td>{{ $row->LP }} cm</td>
                                            <td>{{ $row->Anemia }}</td>
                                            <td>
                                                <a href="/admin/tampilriwayat/{{ $row->id }}"
                                                    class="btn btn-info">Edit</a>
                                                <a href="/admin/deleteriwayat/{{ $row->id }}"
                                                    class="btn btn-danger delete" data-id="{{ $row->id }}"
                                                    data-nama="{{ $row->Nama }}">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end cardaa -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
    </div> <!-- End Page-content -->
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
    <script>
        $('.delete').click(function() {

            var riwayatid = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
        });
    </script>
@endpush
