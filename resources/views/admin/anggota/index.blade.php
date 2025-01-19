@extends('Template.templateadmin')
@push('title')
    POSYANDU | Anggota Kader
@endpush

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush

@section('content')
    <div class="page-content">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Anggota Kader</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                            <li class="breadcrumb-item active">Jumlah Anggota</li>
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
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h4 class="card-title">Tabel Daftar Anggota</h4>
                                    <p class="card-title-desc">Pastikan Anggota yang dimasukkan itu sudah tepat dan benar.
                                    </p>
                                </div>
                                <span>
                                    <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota <i
                                            class="fa fa-plus"></i></a>
                                </span>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-info" role="alert">
                                {{ $message }};
                            </div>
                        @endif
                        <div class="card-body">
                            <table id="datatable"
                                class="table table-striped nowrap dt-responsive nowrap w-100 display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th width="150px">Tanggal Bergabung</th>
                                        <th width="150px">Nama</th>
                                        <th width="150px">Jabatan</th>
                                        <th>Poto</th>
                                        <th>Caption</th>
                                        <th width="150px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                        <tr>
                                            <th scope="row">{{ $no++ }}</th>
                                            <td>{{ $row->tgl_bergabung }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->jabatan }}</td>
                                            <td><img src="{{ asset('storage/' . $row->photo) }}"
                                                    style="height: 100px; width:100px;">
                                            </td>
                                            <td>{!! html_entity_decode($row->caption) !!}</td>
                                            <td>
                                                <form action="{{ route('anggota.destroy', $row->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('anggota.edit', $row->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    <button type="submit" class="btn btn-danger delete">Hapus</button>
                                                </form>

                                            </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->

    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script> -->
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
    <script></script>
@endpush
