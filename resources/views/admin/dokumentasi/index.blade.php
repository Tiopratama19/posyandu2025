@extends('Template.templateadmin')

@push('title')
    Dokumentasi
@endpush
@push('css')
    <style>
          .drop-area {
        background-color: #f8f9fa;
        border: 2px dashed #007bff;
        border-radius: 10px;
        transition: background-color 0.3s ease, border-color 0.3s ease, transform 0.3s ease;
        padding: 20px;
        cursor: pointer;
        text-align: center;
    }

    .drop-area:hover {
        background-color: #e9ecef;
        border-color: #0056b3;
        transform: scale(1.02);
    }

    .drop-area p {
        font-size: 16px;
        color: #6c757d;
    }

    .img-thumbnail {
        max-height: 150px;
        object-fit: cover;
        border-radius: 8px;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        border-radius: 10px;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-body {
        text-align: center;
        padding: 15px;
    }

    .card-text {
        font-size: 14px;
        color: #495057;
        margin-bottom: 10px;
    }

    .btn-danger {
        font-size: 14px;
        padding: 5px 10px;
    }

    .upload-buttons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .preview-container {
        position: relative;
        margin-bottom: 20px;
    }

    .remove-image {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 8px;
        font-size: 14px;
        border-radius: 50%;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .remove-image:hover {
        background-color: #c82333;
    }

    .container {
        max-width: 1200px;
    }

    .button-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
    }

    .button-container .left-buttons {
        display: flex;
        gap: 10px; /* Jarak antar tombol di kiri */
    }

    .button-container .right-buttons {
        display: flex;
        gap: 10px; /* Jarak antar tombol di kanan */
    }

    #upload-form {
        margin: 0; /* Hilangkan margin default form */
    }

    .drop-area {
        margin-bottom: 20px; /* Tambahkan sedikit ruang di bawah drop area */
    }
    </style>
@endpush

@section('content')
<div class="container mt-4">
    <h4 class="mb-4 text-primary">Dokumentasi Jadwal Konseling</h4>

    <!-- Alert Success -->
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <div id="image-preview-container" class="row mt-3"></div>

    <!-- Form Unggah Gambar -->
    <form id="upload-form">
        @csrf
        <div id="drop-area" class="drop-area">
            <p><i class="fas fa-upload"></i> Drag & Drop gambar di sini, atau 
               <span id="file-select-btn" class="btn btn-primary btn-sm">Pilih File</span>
            </p>
            <input type="file" id="images" name="images[]" multiple hidden accept="image/*">
        </div>
        <div class="upload-buttons">
            <button type="button" id="submit-btn" class="btn btn-primary mt-3">Unggah</button>
        </div>
    </form>

    <hr class="my-4">
    <div class="button-container">
        <div class="left-buttons"></div>
        <div class="right-buttons">
            {{-- <button id="deleteSelectedBtn" class="btn btn-danger btn-sm" disabled>Hapus Terpilih</button> --}}
            @if ($dokumentasi->count() > 0)
                <button id="deleteAllButton" class="btn btn-danger btn-sm delete-btnall">Hapus Semua</button>
            @endif
            <a href="{{ url('admin/jadwalkonseling') }}">
                <button class="btn btn-secondary">Kembali</button>
            </a>
        </div>
    </div>

    <!-- Daftar Dokumentasi -->
    <h5 class="mb-4">Daftar Dokumentasi</h5>
    <div class="row" id="dokumentasi-list">
        @foreach ($dokumentasi as $item)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $item->file_path) }}" class="card-img-top" alt="Gambar Dokumentasi">
                    <div class="card-body">
                        {{-- <div class="form-check">
                            <input type="checkbox" class="form-check-input select-checkbox" data-id="{{ $item->id }}">
                            <label class="form-check-label">Pilih</label>
                        </div> --}}
                        <p class="card-text">{!! html_entity_decode($item->description) !!}</p>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $item->id }}">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>    
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('images');
    const submitBtn = document.getElementById('submit-btn');
    const previewContainer = document.getElementById('image-preview-container');
    const dokumentasiList = document.getElementById('dokumentasi-list');
    const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
    const checkboxes = document.querySelectorAll("input[type='checkbox'][data-id]");

    const urlSegments = window.location.pathname.split('/');
    const id = parseInt(urlSegments[urlSegments.length - 1], 10); // Ambil segmen terakhir dan ubah ke integer

    if (isNaN(id)) {
        console.error('ID tidak valid di URL');
        return;
    }

    let filesArray = []; // Menyimpan semua file yang dipilih
    let captions = []; // Menyimpan caption untuk setiap file

    // Fungsi untuk menangani file
    function handleFiles(newFiles) {
        // Tambahkan file baru ke array
        Array.from(newFiles).forEach(file => {
            if (file.type.startsWith('image/')) {
                filesArray.push(file);
                const reader = new FileReader();
                reader.onload = e => {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-4 preview-container';
                    col.innerHTML = `
                        <div class="card shadow-sm">
                            <img src="${e.target.result}" class="img-thumbnail shadow-sm" alt="Preview Gambar">
                            <div class="card-body">
                                <button class="remove-image" onclick="removeImage(${filesArray.length - 1})">X</button>
                                <div class="ckeditor-container">
                                    <textarea id="editor-${filesArray.length - 1}" class="form-control" placeholder="Tuliskan caption..."></textarea>
                                </div>
                            </div>
                        </div>`;
                    previewContainer.appendChild(col);
                    // Inisialisasi CKEditor
                    ClassicEditor
                        .create(document.getElementById(`editor-${filesArray.length - 1}`))
                        .then(editor => {
                            captions.push(editor); // Simpan editor untuk masing-masing file
                        })
                        .catch(error => {
                            console.error(error);
                        });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Event drag & drop
    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, e => {
            e.preventDefault();
            e.stopPropagation();
            dropArea.classList.add('active');
        });
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, e => {
            e.preventDefault();
            e.stopPropagation();
            dropArea.classList.remove('active');
        });
    });

    dropArea.addEventListener('drop', e => handleFiles(e.dataTransfer.files));
    document.getElementById('file-select-btn').addEventListener('click', () => fileInput.click());
    fileInput.addEventListener('change', () => handleFiles(fileInput.files));

    // Proses unggah file
    submitBtn.addEventListener('click', () => {
        const formData = new FormData();
        filesArray.forEach((file, index) => {
            formData.append('images[]', file);
            formData.append('captions[]', captions[index].getData()); // Kirim caption
        });

        // Tampilkan SweetAlert saat proses unggah dimulai
        const uploadingAlert = Swal.fire({
            title: 'Mengunggah...',
            text: 'Mohon tunggu, file sedang diunggah.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading(); // Tampilkan animasi loading
            },
        });

        fetch("{{ route('dokumentasi.store', ['id' => $id]) }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    // Tutup SweetAlert loading
                    Swal.close();

                    // Tampilkan SweetAlert sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Unggah berhasil!',
                        showConfirmButton: false,
                        timer: 1500,
                    });

                    // Render data terbaru
                    renderDokumentasi(data.data, parseInt(id));

                    // Bersihkan area preview dan array
                    previewContainer.innerHTML = '';
                    filesArray = [];
                    captions = [];
                }
            })
            .catch(error => {
                // Tutup SweetAlert loading
                Swal.close();

                // Tampilkan SweetAlert error
                Swal.fire({
                    icon: 'error',
                    title: 'Unggah gagal!',
                    text: error.message,
                });
            });
    });


    function renderDokumentasi(data, id) {
        // Kosongkan elemen dokumentasiList
        dokumentasiList.innerHTML = '';

        // Filter data berdasarkan jadwal_id yang sama dengan id parameter
        const filteredData = data.filter(item => item.jadwal_id === id);

        // Iterasi data yang sudah difilter
        filteredData.forEach(item => {
            const col = document.createElement('div');
            col.className = 'col-md-3 mb-4';
            col.innerHTML = `
                <div class="card shadow-sm">
                    <img src="/storage/${item.file_path}" class="card-img-top" alt="Gambar Dokumentasi">
                    <div class="card-body">
                        <p class="card-text">${item.description || ''}</p>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${item.id}">Hapus</button>
                    </div>
                </div>`;
            dokumentasiList.appendChild(col);
        });

        // Pasang event untuk tombol hapus
        attachDeleteEvents();
    }


    // Event hapus gambar
    function attachDeleteEvents() {
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Hapus Dokumentasi?',
                    text: 'Data ini tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                }).then(result => {
                    if (result.isConfirmed) {
                        fetch(`/admin/dokumentasi/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                renderDokumentasi(data.data, parseInt(id));
                                Swal.fire('Dokumentasi!', 'Gambar berhasil dihapus.', 'success');
                            }
                        });
                    }
                });
            });
        });

        document.querySelectorAll('.delete-btnall').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                Swal.fire({
                    title: 'Hapus Semua Dokumentasi?',
                    text: 'Data ini tidak dapat dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                }).then(result => {
                    if (result.isConfirmed) {
                        fetch(`/admin/dokumentasi/all/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                renderDokumentasi(data.data, parseInt(id));
                                Swal.fire('Dihapus!', 'Dokumentasi berhasil dihapus.', 'success');
                            }
                        });
                    }
                });
            });
        });
    }

    // Inisialisasi event hapus gambar
    attachDeleteEvents();

    // Hapus gambar yang diupload
    window.removeImage = function(index) {
        filesArray.splice(index, 1); 
        captions.splice(index, 1);
        previewContainer.innerHTML = ''; 
        handleFiles(filesArray);
    };
});
</script>
@endpush
