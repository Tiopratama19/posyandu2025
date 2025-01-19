@extends('Template.templateadmin')
@push('title')
    POSYANDU | Dashboard
@endpush
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Selamat Datang Admin !</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            {{-- <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Pasien</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="4000">0</span>
                                    </h4>
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart1" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <!-- card -->
                    <div class="card card-h-100">
                        <!-- card body -->
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Pengidap Anemia</span>
                                    <h4 class="mb-3">
                                        <span class="counter-value" data-target="1223">0</span>
                                    </h4>
                                </div>
                                <div class="flex-shrink-0 text-end dash-widget">
                                    <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts">
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div><!-- end col-->
            </div> <!-- container-fluid --> --}}
        </div>
        <!-- End Page-content -->
    </div>
@endsection
