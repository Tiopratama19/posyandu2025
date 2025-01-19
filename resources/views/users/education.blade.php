<section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="col-12 text-center">
            <h2 class="mb-4">Edukasi</h1>
        </div>

    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($kategori->where('jenis', 'edukasi') as $key => $item)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $key == 0 ? 'active' : '' }}" id="design-tab" data-bs-toggle="tab"
                            data-bs-target="#tab-{{ $item->id }}" type="button" role="tab"
                            aria-controls="design-tab-pane" aria-selected="true">{{ $item->nama }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    @foreach ($kategori->where('jenis', 'edukasi') as $key => $item)
                        <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="tab-{{ $item->id }}"
                            role="tabpanel" aria-labelledby="design-tab" tabindex="0">
                            <div class="row">
                                @foreach ($item->informasi as $item)
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg">
                                            {{-- <a href="{{ url('/detail', $item->id) }}"> --}}
                                            <div class="d-flex">
                                                <div>
                                                    <h5 class="mb-2">{{ $item->judul }}</h5>
                                                    <p class="mb-0">{!! html_entity_decode($item->Caption) !!}</p>

                                                </div>

                                                {{-- <span class="badge bg-design rounded-pill ms-auto">14</span> --}}
                                            </div>
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $item->galeri)) }}"
                                                class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
</section>
