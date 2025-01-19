<!-- Modal -->
<div class="modal fade" id="exampleModalKegiatan-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $item->judul }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0-a"
                            role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Daftar</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="simple-tab-1-a" data-bs-toggle="tab" href="#simple-tabpanel-1-a"
                            role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Peserta</a>
                    </li>
                </ul>
                <div class="tab-content" id="tab-content">
                    <div class="tab-pane active" id="simple-tabpanel-0-a" role="tabpanel"
                        aria-labelledby="simple-tab-0">

                        <form action="{{ route('informasi.peserta.store') }}" id="data-master"
                            enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="hidden" name="id_informasi" value="{{ $item->id }}">
                            <div class="mb-3">
                                <label for="" class="form-label">Nik</label>
                                <input type="text" name="nik" id="nik" class="form-control"
                                    pattern="\d{16}" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Kami tidak akan pernah membagikan
                                    email Anda kepada orang lain.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" id="simpan-data" class="btn btn-primary">Simpan <i
                                        class="fas fa-save"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="simple-tabpanel-1-a" role="tabpanel" aria-labelledby="simple-tab-1">
                        <table class="table table-striped dt-responsive nowrap w-100 display nowrap datatable-2"
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
                                @foreach ($item->peserta as $key => $peserta)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ app('App\Http\Controllers\JadwalKonselingController')->sensor($peserta->nik) }}
                                        </td>
                                        <td>{{ $peserta->nama }}</td>
                                        <td>{{ app('App\Http\Controllers\JadwalKonselingController')->sensor($peserta->email) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
