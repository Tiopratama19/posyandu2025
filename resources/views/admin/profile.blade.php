@extends('Template.templateadmin')

@push('title')
    POSYANDU | Profile
@endpush


(@push('css')
    <link rel="shortcut icon" href="{{ asset('template1/theme/assets/images/users/logoposyandu1.png') }}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('template1/theme/assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('template1/theme/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('template1/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('template1/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
@endpush)
@section('content')
    <br>
    <br>
    <br>

    <div class="page-content">
        <div class="container-fluid">
            {{-- <div class="row">
                <div class="col-xl-12">
                    <div class="profile-user"></div>
                </div>
            </div> --}}
            <div class="row">
                <div class="profile-content">
                    <div class="row align-items-end">
                        <div class="col-sm">
                            <div class="d-flex align-items-end mt-0 mt-sm-0">
                                <div class="flex-shrink-0">
                                    <div class="avatar-xxl me-3">
                                        <img src="{{ asset('template1/theme/assets/images/users/logoposyandu1.png') }}"
                                            alt="" class="img-fluid rounded-circle d-block img-thumbnail">
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div>
                                        <h5 class="font-size-16 mb-1">{{ Auth::user()->name }}</h5>
                                        <p class="text-muted font-size-13 mb-2 pb-2">{{ Auth::user()->type }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card bg-transparent shadow-none">
                        <div class="card-body">
                            <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview"
                                        role="tab">Profile Singkat</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Post</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Tentang</h5>
                                </div>

                                <div class="card-body">
                                    <div>
                                        <div class="pb-3">
                                            <h5 class="font-size-15">Bio :</h5>
                                            <div class="text-muted">
                                                <p class="mb-2"><strong>Posyandu Remaja</strong></p>
                                                <p class="mb-2">Posyandu remaja merupakan salah satu bentuk Upaya
                                                    Kesehatan Bersumber Daya Masyarakat (UKBM) yang dikelola dan
                                                    diselenggarakan dari, oleh, untuk dan bersama masyarakat termasuk remaja
                                                    dalam penyelenggaraan pembangunan kesehatan, guna memberdayakan
                                                    masyarakat dan memberikan kemudahan dalam memperoleh pelayanan kesehatan
                                                    bagi remaja untuk meningkatkan derajat kesehatan dan keterampilan hidup
                                                    sehat remaja. </p>
                                            </div>
                                        </div>

                                        <div class="pt-3">
                                            <h5 class="font-size-15">Melayani:</h5>
                                            <div class="text-muted">
                                                <p></p>
                                                <ul class="list-unstyled mb-0">
                                                    <li class="py-1"><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Pengukuran
                                                        Tinggi Badan</li>
                                                    <li class="py-1"><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Penimbangan
                                                        Berat Badan</li>
                                                    <li class="py-1"><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Pemeriksaan
                                                        Tekanan Darah</li>
                                                    <li class="py-1"><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Konsultasi
                                                        Tentang Kesahatan</li>
                                                    <li class="py-1"><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Pemberian
                                                        Tablet Tambah Darah</li>
                                                    <li class="py-1"><i
                                                            class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Tes
                                                        HIV</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end tab pane -->

                        {{-- <div class="tab-pane" id="post" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="blog-post">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-lg me-3">
                                                <img src="{{ asset('template1/theme/assets/images/users/logoposyandu1.png') }}"
                                                    alt="" class="img-fluid rounded-circle d-block">
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-size-15 text-truncate"><a href="#"
                                                        class="text-dark">Posyandu Mentari</a></h5>
                                                <p class="font-size-13 text-muted mb-0">24 Mar, 2021</p>
                                            </div>
                                        </div>
                                        <div class="pt-3">
                                            <p class="text-muted"></p>

                                        </div>
                                        <div class="position-relative mt-3">
                                            <img src="{{ asset('template1/theme/assets/images/fotbarposyandu.jpg') }}"
                                                alt="" class="img-thumbnail">
                                        </div>
                                        <div class="pt-3">
                                            <div
                                                class="d-flex align-items-center justify-content-between border-bottom pb-3">
                                            </div>
                                            <p class="text-muted mt-4">Rapat kerja dengan anggota kader Posyandu Mentari.
                                            </p>
                                        </div>
                                    </div>
                                    <!-- end blog post -->
                                </div>
                                <!-- end card body -->
                            </div>
                        </div> --}}
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end col -->

                {{-- <div class="col-xl-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Anggota Kader</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50px;"><img
                                                    src="{{ asset('template1/theme/assets/images/users/avatar-2.jpg') }}"
                                                    class="rounded-circle avatar-sm" alt=""></td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">Andri Alhudani</a></h5>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Ketua</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('template1/theme/assets/images/users/avatar-1.jpg') }}"
                                                    class="rounded-circle avatar-sm" alt=""></td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">Lisma Laela Habsy</a></h5>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Sekretaris</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('template1/theme/assets/images/users/avatar-1.jpg') }}"
                                                    class="rounded-circle avatar-sm" alt=""></td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">Afifah Nurhanifah Fadholi</a></h5>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Bendahara</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('template1/theme/assets/images/users/avatar-1.jpg') }}"
                                                    class="rounded-circle avatar-sm" alt=""></td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">Kanila Desta Gustina</a></h5>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Divisi.
                                                        Agama</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('template1/theme/assets/images/users/qintar.jpg') }}"
                                                    class="rounded-circle avatar-sm" alt=""></td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">Qinthari Hasanah</a></h5>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Divisi.
                                                        Humas</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('template1/theme/assets/images/users/avatar-1.jpg') }}"
                                                    class="rounded-circle avatar-sm" alt=""></td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">Septiani Nur Anisa</a></h5>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Divisi.
                                                        Konseling</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><img src="{{ asset('template1/theme/assets/images/users/avatar-1.jpg') }}"
                                                    class="rounded-circle avatar-sm" alt=""></td>
                                            <td>
                                                <h5 class="font-size-14 m-0"><a href="javascript: void(0);"
                                                        class="text-dark">Tio Moreno Pratama Bagi</a></h5>
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="javascript: void(0);"
                                                        class="badge bg-soft-primary text-primary font-size-11">Divisi.
                                                        Budaya</a>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div> --}}
                <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
