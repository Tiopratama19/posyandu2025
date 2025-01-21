@extends('Template.templateadmin')
@push('title')
    POSYANDU | Data Remaja
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
        <div class="container-fluid">


            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Data Remaja</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Table</a></li>
                                <li class="breadcrumb-item active">Jumlah Remaja</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card-body" id="cardPrint">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <div class="button" style="float: right;">
                                    <button class="btn btn-danger" id="button_close_print">Tutup <i
                                            class="fa fa-window-close"></i></button>
                                </div>
                                <form enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tanggal</label>
                                                <input type="text" class="form-control" name="daterange" id="daterange">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- end cardaa -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
            <br>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Data Remaja</h4>
                                <p class="card-title-desc">Pastikan data yang dimasukkan itu sudah tepat dan benar.</p>

                                <div class="button" style="float: right;">
                                    <button class="btn btn-primary" id="tambah_data">Tambah Data <i
                                            class="fa fa-plus"></i></button>
                                    <button class="btn btn-success" id="button_print">Print <i
                                            class="fa fa-print"></i></button>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-info" role="alert">
                                    {{ $message }};
                                </div>
                            @endif

                            <br />
                            <div class="container">
                                <div class="row input-daterange">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="month-picker">
                                                Pilih Bulan:</label>
                                            <input type="text" id="month-picker" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="month-picker">
                                                Pilih Bulan:</label>
                                            <input type="text" id="month-picker" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <br>
                                            <button type="button" name="filter" id="filter"
                                                class="btn btn-primary">Filter
                                                <i class="fa fa-filter"></i></button>
                                            <button type="button" name="refresh" id="refresh"
                                                class="btn btn-secondary">Refresh <i class="fa fa-refresh"
                                                    aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />

                            <div class="card-body">
                                <table id="datatable" class="table table-striped dt-responsive nowrap w-100 display nowrap"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>

                                            <th width="230px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($data as $index => $row)
                                            <tr>
                                                <th scope="row">{{ $no++ }}</th>
                                                <td>{{ $row->nik }}</td>
                                                <td>{{ $row->Nama }}</td>
                                                <td>{{ $row->TempatLahir }}</td>
                                                <td>{{ \Carbon\Carbon::parse($row->TanggalLahir)->isoFormat('D MMMM YYYY') }}
                                                </td>
                                                <td>{{ $row->JenisKelamin }}</td>

                                                <td>
                                                    <a href="/admin/tampildata/{{ $row->id }}"
                                                        class="btn btn-info">Edit</a>
                                                    <a href="/admin/riwayat/{{ $row->id }}"
                                                        class="btn btn-primary">Detail</a>
                                                    <a href="#" class="btn btn-danger delete"
                                                        data-id="{{ $row->id }}"
                                                        data-nama="{{ $row->Nama }}">Hapus</a>
                                                    <!-- /deletedata/{{ $row->id }} -->
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
    <!-- Required datatable js -->

    <!-- <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script> -->
    <script>
        $(document).ready(function() {

            $('#cardPrint').hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(this).on('click', '#button_print', function(e) {

                $('#cardPrint').show();
                $('#button_print').attr('disabled', true);
            });

            $(this).on('click', '#button_close_print', function(e) {
                $('#cardPrint').hide();
                $('#button_print').attr('disabled', false);
            });

            $(this).on('click', '#tambah_data', function(e) {
                Swal.fire({
                    title: 'Pilih Opsi',
                    text: 'Mau tambah data secara manual atau import Excel?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Tambah Manual',
                    cancelButtonText: 'Import Excel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ url('admin/tambah') }}';
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        showImportPopup();
                    }
                });
            });

            function showImportPopup() {
                Swal.fire({
                    title: 'Import Excel',
                    html: `<input type="file" id="file-input" class="swal2-input" accept=".xls,.xlsx">
               <label for="file-input">Pilih file Excel</label>`,
                    showCancelButton: true,
                    confirmButtonText: 'Upload',
                    preConfirm: () => {
                        const fileInput = document.getElementById('file-input');
                        if (!fileInput.files.length) {
                            Swal.showValidationMessage('Silakan pilih file Excel');
                        }
                        return fileInput.files[0];
                    }
                }).then((result) => {
                    if (result.value) {
                        uploadFile(result.value);
                    }
                });
            }

            function uploadFile(file) {
                const formData = new FormData();
                formData.append('file', file);

                fetch('{{ url('admin/import') }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(response => response.json())
                    .then(data => {
                        if (data.status == 'success') {
                            Swal.fire({
                                title: 'Sukses',
                                text: data.message,
                                icon: 'success'
                            });
                            window.location.href = '{{ url('admin/dataremaja') }}';
                        } else {
                            Swal.fire({
                                title: 'Error',
                                text: data.message,
                                icon: 'error'
                            });
                        }
                    });
            }

            $(document).on('click', '.delete', function(e) {
                e.preventDefault();

                var remajaid = $(this).attr('data-id');
                var nama = $(this).attr('data-nama');
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success ms-3', // Menambahkan margin-start untuk memberi jarak lebih lebar
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                    title: 'Apakah Kamu Yakin?',
                    text: "Anda tidak akan dapat mengembalikannya!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Tidak, gajadi!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = "/admin/deletedata/" + remajaid + ""
                        swalWithBootstrapButtons.fire(
                            'Dihapus!',
                            'Filemu berhasil dihapus.',
                            'success'
                        )
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Gajadi',
                            'Filemu aman :)',
                            'error'
                        )
                    }
                })

            });

        });
    </script>

    <script>
        $(document).ready(function() {


            $('#datatable').DataTable();

            $('.input-daterange').datepicker({
                format: 'MM',
                viewMode: 'months',
                minViewMode: 'months'
            });
            var startDate;
            var endDate;
            const currentYear = new Date().getFullYear();

            const minDate = `01/01/${currentYear}`;
            const maxDate = `12/31/${currentYear}`;
            $('#daterange').daterangepicker({
                    startDate: moment().subtract('days', 29),
                    endDate: moment(),
                    minDate: minDate,
                    maxDate: maxDate,
                    dateLimit: {
                        days: 60
                    },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                        'Hari Ini': [moment(), moment()],
                        'Kemarin': [moment().subtract('days', 1), moment().subtract('days', 1)],
                        '7 Hari Terakhir': [moment().subtract('days', 6), moment()],
                        '30 hari terakhir': [moment().subtract('days', 29), moment()],
                        'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                        'Bulan lalu': [moment().subtract('month', 1).startOf('month'), moment().subtract(
                            'month', 1).endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'DD/MM/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Submit',
                        fromLabel: 'From',
                        toLabel: 'To',
                        customRangeLabel: 'Custom Range',
                        daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                            'September', 'October', 'November', 'December'
                        ],
                        firstDay: 1
                    }
                },
                function(start, end) {
                    $('#reportrange span').html(start.format('D MMMM YYYY') + ' - ' + end.format(
                        'D MMMM YYYY'));
                    startDate = start;
                    endDate = end;

                    var data = '';
                    Swal.fire({
                        title: 'Notifikasi',
                        text: "Apakah anda yakin akan men-generate raport laporan ini ?",
                        icon: 'question',
                        showCancelButton: true,
                        buttonsStyling: true,
                        confirmButtonClass: 'btn btn-danger btn-lg mr-2',
                        cancelButtonClass: 'btn btn-primary btn-lg',
                        confirmButtonText: 'Generate <i class="fas fa-download"></i>',
                        cancelButtonText: 'Batal <i class="fas fa-close"> </i>'
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "GET",
                                url: `{{ url('laporan/dataremaja') }}/${startDate.format('YYYY-MM-DD')}/${endDate.format('YYYY-MM-DD')}`,
                                data: data,
                                contentType: 'application/json',
                                success: function(response) {
                                    if (response.pdfUrls && response.pdfUrls.length > 0) {
                                        response.pdfUrls.forEach(function(pdfUrl) {
                                            downloadPdfFromUrls(pdfUrl);
                                        });

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Berhasil',
                                            text: 'Data Berhasil Digenerate!',
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Gagal',
                                            text: 'Tidak ada PDF yang dihasilkan!',
                                        });
                                    }

                                },
                                error: function(xhr, status, error) {
                                    let message = 'Terjadi kesalahan';

                                    try {
                                        // Parse response JSON
                                        let response = JSON.parse(xhr.responseText);
                                        // Ambil pesan error dan translate ke Indonesia
                                        if (response.error ===
                                            "No data found for the given date range") {
                                            message =
                                                "Tidak ada data untuk rentang tanggal yang diberikan";
                                        } else {
                                            message = response.error ||
                                                message; // Fallback jika pesan lain ada
                                        }
                                    } catch (e) {
                                        message = xhr.statusText || error;
                                    }

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Gagal',
                                        text: message,
                                    });
                                }
                            });
                        }
                    })
                }
            );
            //Set the initial state of the picker label
            $('#reportrange span').html(moment().subtract('days', 29).format('D MMMM YYYY') + ' - ' + moment()
                .format('D MMMM YYYY'));

            $('#saveBtn').click(function() {
                console.log(startDate.format('D MMMM YYYY') + ' - ' + endDate.format('D MMMM YYYY'));
            });

            // function downloadPdf(url) {
            //     var filename = '';
            //     var xhr = new XMLHttpRequest();
            //     xhr.open('GET', url, true);
            //     xhr.responseType = 'blob';

            //     xhr.onload = function () {
            //         if (xhr.status === 200) {
            //             var disposition = xhr.getResponseHeader('Content-Disposition');
            //             if (disposition && disposition.indexOf('attachment') !== -1) {
            //                 var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
            //                 var matches = filenameRegex.exec(disposition);
            //                 if (matches != null && matches[1]) {
            //                     filename = matches[1].replace(/['"]/g, '');
            //                 }
            //             }

            //             // Fallback filename if none found
            //             if (!filename) {
            //                 filename = 'laporan.pdf';
            //             }

            //             var blob = new Blob([xhr.response], {
            //                 type: 'application/pdf'
            //             });

            //             var link = document.createElement('a');
            //             link.href = window.URL.createObjectURL(blob);
            //             link.download = filename; // Use the parsed filename or default to 'laporan.pdf'

            //             // Trigger the download
            //             link.click();
            //         } else {
            //             // Handle error case
            //             Swal.fire({
            //                 icon: 'error',
            //                 title: 'Gagal',
            //                 text: 'Gagal mengunduh PDF!',
            //             });
            //         }
            //     };

            //     xhr.send();
            // }

            // Fungsi untuk mengunduh PDF menggunakan URL yang sudah dikembalikan oleh server
            function downloadPdfFromUrls(pdfUrls) {
                console.log("Downloading PDFs: ", pdfUrls);

                if (Array.isArray(pdfUrls)) {
                    pdfUrls.forEach(function(pdfUrl) {
                        var link = document.createElement('a');
                        link.href = pdfUrl.url;
                        link.download = pdfUrl.filename;
                        link.click();
                    });
                } else if (typeof pdfUrls === 'object') {
                    var link = document.createElement('a');
                    link.href = pdfUrls.url;
                    link.download = pdfUrls.filename;
                    link.click();
                }
            }

        });
    </script>

    <script>
        $('#filter').click(function() {
            var from_date = $('#month-picker').val();
            var to_date = $('#month-picker').val();
            if (from_date != '' && to_date != '') {
                $('#datatable').DataTable().destroy();
                load_data(from_date, to_date);
            } else {
                alert('Both Date is required');
            }
        });

        $('#refresh').click(function() {
            $('#from_date').val('');
            $('#to_date').val('');
            $('#datatable').DataTable().destroy();
            load_data();
        });
        load_data();

        function load_data(from_date = '', to_date = '') {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url('admin/filterdataremaja') }}',
                    data: {
                        from_date: from_date,
                        to_date: to_date
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'NIK',
                        name: 'NIK'
                    },
                    {
                        data: 'Nama',
                        name: 'Nama'
                    },
                    {
                        data: 'TempatLahir',
                        name: 'TempatLahir'
                    },
                    {
                        data: 'TanggalLahir',
                        name: 'TanggalLahir'
                    },
                    {
                        data: 'JenisKelamin',
                        name: 'JenisKelamin'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        }
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
@endpush
