@extends('layouts.app2')

@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $kontrakbeli }}</h3>
                        <p>Kontrak Beli</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('admin.transaksi.kontrakbeli.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $kontrakjual }}</h3>
                        <p>Kontrak Jual</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('admin.transaksi.kontrakjual.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $supplier }}</h3>
                        <p>Supplier</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="{{ route('admin.master.supplier.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $customer }}</h3>
                        <p>Customer</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin.master.customer.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Bongkaran Terakhir</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Truk</th>
                                        <th>Muat</th>
                                        <th>Bongkar</th>
                                        <th>Susut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bongkardetaillast as $item)
                                        <tr>
                                            <td><a
                                                    href="{{ route('admin.transaksi.muatbongkar.show', $item->muatbongkar->id) }}">{{ $item->muatbongkar->no }}</a>
                                            </td>
                                            <td>{{ $item->muatbongkar->armada->plat }}</td>
                                            <td>{{ number_format($item->muatbongkar->muat, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->muatbongkar->bongkar, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->muatbongkar->susut, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <a href="{{ route('admin.transaksi.muatbongkar.create') }}"
                            class="btn btn-sm btn-info float-left">Tambah Muat Bongkar</a>
                        <a href="{{ route('admin.transaksi.muatbongkar.index') }}"
                            class="btn btn-sm btn-secondary float-right">View All Muat Bongkar</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Laba</h3>
                            <a href="{{ route('admin.laporan.keuntungan.index') }}">Generate Report Keuntungan</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span
                                    class="text-bold text-lg">{{ number_format(
                                        $bongkardetails->sum(function ($item) {
                                            return $item->muatbongkar->labakotor();
                                        }),
                                        0,
                                        ',',
                                        '.',
                                    ) }}</span>
                                <span>Laba Kotor Bulan Ini</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                                <span
                                    class="text-bold text-lg">{{ number_format(
                                        $bongkardetails->sum(function ($item) {
                                            return $item->muatbongkar->lababersih();
                                        }),
                                        0,
                                        ',',
                                        '.',
                                    ) }}</span>
                                <span>Laba Bersih Bulan Ini</span>
                            </p>

                        </div>

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> Laba Kotor
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Laba Bersih
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Harga Kontrak Beli Terakhir (Include PPN)</span>
                        <span class="info-box-number">Rp.
                            {{ number_format($kblast->hargappn(), 0, ',', '.') }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="info-box mb-3 bg-danger">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Harga Kontrak Jual Terakhir (Include PPN)</span>
                        <span class="info-box-number">Rp.
                            {{ number_format($kjlast->hargappn(), 0, ',', '.') }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Laba Kotor</span>
                        <span class="info-box-number">Rp.
                            {{ number_format(
                                $bongkardetails->sum(function ($item) {
                                    return $item->muatbongkar->labakotor();
                                }),
                                0,
                                ',',
                                '.',
                            ) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fas fa-car" aria-hidden="true"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Biaya Ongkos</span>
                        <span class="info-box-number">Rp.
                            {{ number_format(
                                $bongkardetails->sum(function ($item) {
                                    return $item->muatbongkar->totaldibayar();
                                }),
                                0,
                                ',',
                                '.',
                            ) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-danger">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Laba Bersih</span>
                        <span class="info-box-number">Rp.
                            {{ number_format(
                                $bongkardetails->sum(function ($item) {
                                    return $item->muatbongkar->lababersih();
                                }),
                                0,
                                ',',
                                '.',
                            ) }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Kontrak Beli</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($recentkb as $item)
                                <li class="item">
                                    <div>
                                        <a href="{{ route('admin.transaksi.kontrakbeli.show', $item->id) }}"
                                            class="product-title">{{ $item->no }}
                                            <span class="badge badge-warning float-right">Rp.
                                                {{ $item->hargappn() }} (Inc PPN)</span></a>
                                        <span class="product-description">
                                            {{ ucwords(\App\Helper\terbilang($item->hargappn())) }} Rupiah
                                        </span>
                                    </div>
                                </li>
                            @endforeach

                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="{{ route('admin.transaksi.kontrakbeli.index') }}" class="uppercase">View All Kontrak
                            Beli</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recently Kontrak Jual</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            @foreach ($recentkj as $item)
                                <li class="item">
                                    <div>
                                        <a href="{{ route('admin.transaksi.kontrakjual.show', $item->id) }}"
                                            class="product-title">{{ $item->no }}
                                            <span class="badge badge-warning float-right">Rp.
                                                {{ $item->hargappn() }} (Inc PPN)</span></a>
                                        <span class="product-description">
                                            {{ ucwords(\App\Helper\terbilang($item->hargappn())) }} Rupiah
                                        </span>
                                    </div>
                                </li>
                            @endforeach

                            <!-- /.item -->
                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <a href="{{ route('admin.transaksi.kontrakjual.index') }}" class="uppercase">View All Kontrak
                            Jual</a>
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
    </div>
    <script src="/AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <script src="/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="/AdminLTE/dist/js/adminlte.js"></script>
    <script>
        $(function() {
            'use strict';

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            };

            var mode = 'index';
            var intersect = true;

            var $salesChart = $('#sales-chart');

            // Grouping bongkardetailyear data by month and summing up laba_bersih and laba_kotor
            var monthlyData = {!! $bongkardetailyear->groupBy(function ($item) {
                    return Carbon\Carbon::parse($item->tanggal)->format('M');
                })->map(function ($group) {
                    return [
                        'laba_bersih' => $group->sum(function ($item) {
                            return $item->muatbongkar->lababersih();
                        }),
                        'laba_kotor' => $group->sum(function ($item) {
                            return $item->muatbongkar->labakotor();
                        }),
                    ];
                }) !!};

            var salesChart = new Chart($salesChart, {
                type: 'bar',
                data: {
                    labels: Object.keys(monthlyData), // Get the months as labels
                    datasets: [{
                        backgroundColor: '#007bff',
                        borderColor: '#007bff',
                        data: Object.values(monthlyData).map(function(month) {
                            return month.laba_kotor;
                        })
                    }, {
                        backgroundColor: '#ced4da',
                        borderColor: '#ced4da',
                        data: Object.values(monthlyData).map(function(month) {
                            return month.laba_bersih;
                        })

                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                callback: function(value) {
                                    if (value >= 1000) {
                                        value /= 1000;
                                        value += 'k';
                                    }
                                    return 'Rp. ' + value;
                                }
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            });
        });
    </script>

@endsection
