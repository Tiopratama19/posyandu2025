@push('css')
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('template1/theme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">

    <style>
        .icon-holder {
            border-radius: 4px;
            background-color: #5ca1e1;
            border: none;
            color: #fff;
            text-align: center;
            font-size: 32px;
            padding: 16px;
            width: 220px;
            transition: all 0.5s;
            cursor: pointer;
            box-shadow: 0 10px 20px -8px rgba(0, 0, 0, .7);
        }

        .icon-holder {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .icon-holder:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 14px;
            right: -20px;
            transition: 0.5s;
        }

        .icon-holder:hover {
            padding-right: 24px;
            padding-left: 8px;
        }

        .icon-holder:hover:after {
            opacity: 1;
            right: 10px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 5px 10px;
            margin: 2px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: #333;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #e9ecef;
            border-color: #ddd;
            color: #333;
        }

        .pagination-controls {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination-controls button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .pagination-controls button:hover {
            background-color: #0056b3;
        }

        .pagination-controls button:disabled {
            background-color: #cccccc;
            cursor: not-allowed;
        }
    </style>

    <link href="{{ asset('alert/css/sweetalert2.css') }} " rel="stylesheet" />
@endpush

<section class="timeline-section section-padding" id="section_3">
    <div class="section-overlay"></div>
    <div class="container">
        <div class="row">

            <div class="col-12 text-center">
                <h2 class="text-white mb-4">Jadwal Kegiatan
            </div>

            <div class="col-lg-10 col-12 mx-auto">
                <div class="timeline-container">
                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                        <div class="list-progress">
                            <div class="inner"></div>
                        </div>
                    </ul>
                </div>
            </div>

            <div class="float-right">
                <!-- Kontrol Paginasi -->
                <div class="pagination-controls">
                    <button onclick="prevPage()">Sebelumnya</button>
                    <button onclick="nextPage()">Selanjutnya</button>
                </div>

            </div>
        </div>

        @foreach ($counseling as $item)
            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel-{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 60%">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel-{{ $item->id }}">Jadwal
                                Konseling</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="simple-tab-0-{{ $item->id }}"
                                        data-bs-toggle="tab" href="#simple-tabpanel-0-{{ $item->id }}"
                                        role="tab" aria-controls="simple-tabpanel-0-{{ $item->id }}"
                                        aria-selected="true">Daftar</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="simple-tab-1-{{ $item->id }}" data-bs-toggle="tab"
                                        href="#simple-tabpanel-1-{{ $item->id }}" role="tab"
                                        aria-controls="simple-tabpanel-1-{{ $item->id }}"
                                        aria-selected="false">Peserta</a>
                                </li>
                            </ul>
                            <div class="tab-content pt-2" id="tab-content-{{ $item->id }}">
                                <div class="tab-pane active" id="simple-tabpanel-0-{{ $item->id }}" role="tabpanel"
                                    aria-labelledby="simple-tab-0-{{ $item->id }}">
                                    <form id="data-master-{{ $item->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nik</label>
                                            <input type="text" name="nik" id="nik" class="form-control"
                                                pattern="\d{16}" onkeypress="return hanyaAngka(event)" required
                                                value="{{ auth()->check() ? auth()->user()->nik : 'guest' }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                aria-describedby="emailHelp"
                                                value="{{ auth()->check() ? auth()->user()->email : 'guest' }}"
                                                readonly>
                                            <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan
                                                email Anda kepada orang lain.</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control"
                                                aria-describedby="emailHelp"
                                                value="{{ auth()->check() ? auth()->user()->name : 'guest' }}"
                                                readonly>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" id="simpan-data"
                                                class="btn btn-primary simpan-data" data-id="{{ $item->id }}">
                                                Simpan <i class="fas fa-save"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="simple-tabpanel-1-{{ $item->id }}" role="tabpanel"
                                    aria-labelledby="simple-tab-1-{{ $item->id }}">
                                    <table id="datatable-{{ $item->id }}"
                                        class="table table-striped dt-responsive nowrap w-100 display nowrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nik</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</section>

@push('js')
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

    <script src="{{ URL::to('alert/js/sweetalert.js') }}"></script>

    <script type="text/javascript">
        function showPastAlert(activityName) {
            Swal.fire({
                title: 'Kegiatan Terlewat',
                text: `Kegiatan "${activityName}" sudah terlewat.`,
                icon: 'warning',
                confirmButtonText: 'OK',
            });
        }

        function initializePagination() {
            const itemsPerPage = 2;
            let currentPage = 1;
            const items = document.querySelectorAll('.timeline-item');

            function showPage(page) {
                const start = (page - 1) * itemsPerPage;
                const end = start + itemsPerPage;

                items.forEach((item, index) => {
                    if (index >= start && index < end) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            function updatePaginationControls() {
                const prevButton = document.querySelector('.pagination-controls button:first-child');
                const nextButton = document.querySelector('.pagination-controls button:last-child');

                prevButton.disabled = (currentPage === 1);
                nextButton.disabled = (currentPage * itemsPerPage >= items.length);
            }

            function prevPage() {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                    updatePaginationControls();
                }
            }

            function nextPage() {
                if ((currentPage * itemsPerPage) < items.length) {
                    currentPage++;
                    showPage(currentPage);
                    updatePaginationControls();
                }
            }

            // Attach events
            document.querySelector('.pagination-controls button:first-child').onclick = prevPage;
            document.querySelector('.pagination-controls button:last-child').onclick = nextPage;

            // Initialize the first page
            showPage(currentPage);
            updatePaginationControls();
        }

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

        function openModalWithId(id) {
            // Dapatkan modal berdasarkan ID
            var modal = document.getElementById(`exampleModal-${id}`);

            // Gunakan Bootstrap modal method untuk menampilkan modal
            var bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();

            // Inisialisasi DataTable jika belum diinisialisasi
            if (!$.fn.DataTable.isDataTable(`#datatable-${id}`)) {

                var table = $(`#datatable-${id}`).dataTable({
                    autoWidth: true,
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    responsive: true,
                    language: {
                        processing: '<span style="color:#black;">Mohon Tunggu...</span><i class="fa fa-refresh fa-spin fa-3x fa-fw" style="color:#2510A3;"></i>',
                        sEmptyTable: "Tidak Ada Data Yang Tersedia Pada Tabel Ini",
                        sLengthMenu: "Tampilkan _MENU_ Baris",
                        sZeroRecords: "Tidak Ditemukan Data Yang Sesuai",
                        sInfo: "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Baris",
                        sInfoEmpty: "Menampilkan 0 Sampai 0 Dari 0 Baris",
                        sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
                        sInfoPostFix: "",
                        sSearch: "Cari:",
                        sUrl: "",
                        oPaginate: {
                            sFirst: "Pertama",
                            sPrevious: "Sebelumnya",
                            sNext: "Selanjutnya",
                            sLast: "Terakhir",
                        },
                    },
                    stateSave: true,
                    order: [],
                    ajax: `{{ url('getpeserta') }}/${id}`,
                    deferRender: true,
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'nik',
                            name: 'nik'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                    ]
                });

            }
        }

        function loadCounselingData() {
            $.ajax({
                url: `{{ url('get-counseling-data') }}`,
                method: 'GET',
                success: function(data) {
                    $('#vertical-scrollable-timeline').html(data);
                    initializePagination();
                },
                error: function() {
                    console.log('Gagal memuat data konseling');
                }
            });
        }

        setInterval(loadCounselingData, 10000);
        loadCounselingData();

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 10000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            function reset() {
                $('input').val('');
            }


            $('.simpan-data').click(function(event) {
                event.preventDefault();
                var id = $(this).data('id');
                var formData = $(`#data-master-${id}`).serialize();

                $.ajax({
                    url: `{{ url('tambahpeserta') }}/${id}`,
                    type: "POST",
                    data: formData,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Memproses Data',
                            text: 'Harap tunggu beberapa saat...',
                            icon: 'info',
                            allowOutsideClick: false, // Tidak boleh klik di luar
                            showConfirmButton: false, // Sembunyikan tombol konfirmasi
                            didOpen: () => {
                                Swal.showLoading(); // Menampilkan loader
                            }
                        });
                    },
                    success: function(response) {
                        $(`#simpan-data-${id}`).html("Simpan");
                        $(`#simpan-data-${id}`).removeAttr('disabled');
                        let oTable = $(`#datatable-${id}`).dataTable();
                        oTable.fnDraw(false);
                        if (response.status == 1) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Berhasil Menambah Data !',
                            });

                            // Select "Daftar" and "Peserta" tabs and their panels
                            const daftarTabPanel = document.getElementById(
                                `simple-tabpanel-0-${id}`);
                            const pesertaTabPanel = document.getElementById(
                                `simple-tabpanel-1-${id}`);
                            const daftarTab = document.getElementById(
                                `simple-tab-0-${id}`);
                            const pesertaTab = document.getElementById(
                                `simple-tab-1-${id}`);


                            // Deactivate "Daftar" tab
                            daftarTab.classList.remove("active");
                            daftarTab.setAttribute("aria-selected", "false");
                            daftarTabPanel.classList.remove("active", "show");

                            // Activate "Peserta" tab
                            pesertaTab.classList.add("active");
                            pesertaTab.setAttribute("aria-selected", "true");
                            pesertaTabPanel.classList.add("active", "show");
                        } else if (response.status == 2) {
                            Toast.fire({
                                icon: 'warning',
                                title: 'Data Sudah Terdaftar'
                            });

                            $(`#simpan-data-${id}`).html("Simpan");
                            $(`#simpan-data-${id}`).removeAttr('disabled');
                        }
                        // Tambahkan logika refresh data table atau update tampilan sesuai kebutuhan
                    },
                    error: function(xhr, status, error) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan saat menyimpan data.'
                        });
                        $(`#simpan-data-${id}`).html("Simpan");
                        $(`#simpan-data-${id}`).removeAttr('disabled');
                    }
                });
            });

        });
    </script>
@endpush
