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
                            <span class="pull-left">view details</span>
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
                            <span class="pull-left">view details</span>
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
                            <span class="pull-left">view details</span>
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
                            <span class="pull-left">view details</span>
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
                            <span class="pull-left">view details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header text-white" style="background: #495C83">
                    <h6>Grafik Penduduk Berdasarkan Usia</h6>
                </div>
                <div class="card-body">
                    <div id="grafikUsia">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-5">
                <div class="card-header text-white" style="background: #495C83">
                    <h6>Grafik Penduduk Berdasarkan Jenis Kelamin</h6>
                </div>
                <div class="card-body">
                    <div id="grafikJender">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
  <script src="assets/js/highcharts.js"></script>
  <script>
        Highcharts.chart('grafikJender', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Penduduk Berdasarkan Jenis Kelamin'
        },
        subtitle: {
            text: 'Kelurahan Teluk Mutiara'
        },
        xAxis: {
            categories: [
                'Laki-Laki',
                'Perempuan',
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: 'Million tonnes CO<sub>2</sub>-equivalents'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: [{{ $link1 }}, {{ $link2 }}]
        }]
    });
</script>


<script>
    Highcharts.chart('grafikUsia', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Penduduk Berdasarkan Usia'
        },
        subtitle: {
            text: 'Kelurahan Teluk Mutiara'
        },
        xAxis: {
            categories: [
                '0 - 1 Tahun',
                '2 - 10 Tahun',
                '11 - 19 Tahun',
                '20 - 60 Tahun',
                'Di atas 60 Tahun',
            ],
            crosshair: true
        },
        yAxis: {
            title: {
                useHTML: true,
                text: 'Million tonnes CO<sub>2</sub>-equivalents'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: [12.0, 12.0, 30.0, 12.0, 13.0]
        }]
    });
</script>

@stop