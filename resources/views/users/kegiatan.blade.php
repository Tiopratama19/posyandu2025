@push('css')
    
<style>
    .carousel-item img {
        height: 400px; /* Atur tinggi sesuai kebutuhan */
        width: 100%; /* Sesuaikan dengan lebar container */
        object-fit: contain; /* Menampilkan seluruh gambar tanpa memotong */
        border-radius: 10px;
        background-color: #f8f9fa; /* Tambahkan latar belakang agar terlihat rapi */
    }

    .card-body {
        text-align: center;
        padding: 10px;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
        color: #555;
    }
</style>



@endpush
<section class="explore-section section-padding" id="section_5">
    <div class="container">
        <div class="col-12 text-center">
            <h2 class="mb-4">Dokumentasi Kegiatan</h2>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!-- Tab untuk setiap jadwal konseling -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($jadwals as $key => $jadwal)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="jadwal-{{ $jadwal->id }}-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-{{ $jadwal->id }}" type="button" role="tab"
                            aria-controls="jadwal-{{ $jadwal->id }}-pane" aria-selected="true">
                            {{ $jadwal->NamaKegiatan }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    @foreach ($jadwals as $key => $jadwal)
                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="tab-{{ $jadwal->id }}"
                            role="tabpanel" aria-labelledby="jadwal-{{ $jadwal->id }}-tab" tabindex="0">
                            
                            @if ($jadwal->dokumentasi->count() > 3)
                                <!-- Carousel -->
                                <div id="carousel-{{ $jadwal->id }}" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($jadwal->dokumentasi as $docKey => $doc)
                                            <div class="carousel-item {{ $docKey == 0 ? 'active' : '' }}">
                                                <div class="card shadow-sm border-0">
                                                    <img src="{{ asset('storage/' . str_replace('public/', '', $doc->file_path)) }}"
                                                        class="card-img-top img-fluid" alt="{{ $doc->judul }}">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $doc->judul }}</h5>
                                                        <p class="card-text text-muted">{!! html_entity_decode($doc->description) !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $jadwal->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $jadwal->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                                
                            @else
                                <!-- Grid Layout -->
                                <div class="row">
                                    @foreach ($jadwal->dokumentasi as $doc)
                                        <div class="col-lg-4 col-md-6 col-12 mb-4">
                                            <div class="card shadow-sm border-0">
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $doc->file_path)) }}"
                                                    class="card-img-top img-fluid" alt="{{ $doc->judul }}" 
                                                    style="height: 250px; object-fit: cover;">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $doc->judul }}</h5>
                                                    <p class="card-text text-muted">{!! html_entity_decode($doc->description) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
@endpush