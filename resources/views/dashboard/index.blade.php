@extends('dashboard.templates.main')

@section('container')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 text-gray-800">Dashboard</h4>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Penduduk</div>
                        </div>
                        <div class="col-auto fs-5">
                            {{ $penduduk->count() }}
                        </div>
                    </div>
                    <a href="/dashboard/penduduk" class="mt-2 d-block">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Pindah</div>
                        </div>
                        <div class="col-auto fs-5">
                            {{ $pindah->count() }}
                        </div>
                    </div>
                    <a href="/dashboard/pindah" class="mt-2 d-block">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Kematian</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto fs-5">
                            {{ $kematian->count() }}
                        </div>
                    </div>
                    <a href="/dashboard/kematian" class="mt-2 d-block">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Pendatang
                            </div>
                        </div>
                        <div class="col-auto fs-5">
                            {{ $pendatang->count() }}
                        </div>
                    </div>
                    <a href="/dashboard/pendatang" class="mt-2 d-block">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

         <!-- Pending Requests Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Data Kelahiran
                            </div>
                        </div>
                        <div class="col-auto fs-5">
                            {{ $kelahiran->count() }}
                        </div>
                    </div>
                    <a href="/dashboard/kelahiran" class="mt-2 d-block">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
    <div class="card mb-5">
        <div class="card-header text-white" style="background: #495C83">
            <h6>Jumlah Penduduk Berdasarkan Jenis Kelamin</h6>
        </div>
        <div class="card-body">
            <div id="grafik">
                
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('templates/vendor/chart.js/highcharts.js') }}"></script> --}}
    {{-- <script type="text/javascript">
        var pendapatan =  <?php echo json_encode($totalHarga) ?>;
        var bulan = <?php echo json_encode($bulan) ?>;
        Highcharts.chart('grafik', {
            title : {
                text: 'Pendapatan Perbulan'
            },
            xAxis : {
                categories: bulan
            },
            yAxis : {
               title: {
                    text : 'Nominal Pendapatan Perbulan'
               }
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [
                {
                    name: 'Nominal Pendapatan',
                    data: pendapatan
                }
            ]
        });
    </script> --}}
@endsection