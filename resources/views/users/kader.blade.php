<section class="explore-section section-padding" id="section_4">
    <div class="container">
        <div class="col-12 text-center">
            <h2 class="mb-4">Informasi Anggota</h1>
        </div>

    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
                @foreach ($anggota as $jabatan => $agt)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="{{ str($jabatan)->slug() }}-tab"
                            data-bs-toggle="tab" data-bs-target="#{{ str($jabatan)->slug() }}-tab-pane" type="button"
                            role="tab" aria-controls="{{ str($jabatan)->slug() }}-tab-pane"
                            aria-selected="true">{{ $jabatan }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="tab-content" id="myTabContentAnggota">
                    @foreach ($anggota as $jabatan => $agt)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="{{ str($jabatan)->slug() }}-tab-pane" role="tabpanel" aria-labelledby="design-tab"
                            tabindex="0">
                            <div class="row">
                                @foreach ($agt as $item)
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg">
                                            <div class="d-block">
                                                <div class="text-center">
                                                    <h5 class="mb-2">{{ $item->nama }}</h5>
                                                    <p class="mb-0">{!! html_entity_decode($item->caption) !!}</p>
                                                </div>
                                            </div>
                                            <img src="{{ asset('storage/' . $item->photo) }}"
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
