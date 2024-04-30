@extends('layouts.app2')

@section('title', 'Generate Report - Keuntungan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Generate Report - Keuntungan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>No Pengiriman</th>
                                    <th>Truk</th>
                                    <th>Muat</th>
                                    <th>Bongkar</th>
                                    <th>Susut</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Laba Kotor</th>
                                    <th>Biaya Ongkos</th>
                                    <th>Laba Bersih</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bongkardetails as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->muatbongkar->no }}</td>
                                        <td>{{ $item->muatbongkar->armada->plat }}</td>
                                        <td>{{ number_format($item->muatbongkar->muat, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($item->muatbongkar->bongkar, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($item->muatbongkar->susut, 0, ',', '.') }} Kg</td>
                                        <td>Rp. {{ number_format($item->muatbongkar->hargabeli(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->muatbongkar->hargajual(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->muatbongkar->labakotor(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->muatbongkar->totaldibayar(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->muatbongkar->lababersih(), 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-bold">Total</td>
                                    <td>{{ number_format($bongkardetails->sum('muatbongkar.muat'), 0, ',', '.') }} Kg</td>
                                    <td>{{ number_format($bongkardetails->sum('muatbongkar.bongkar'), 0, ',', '.') }} Kg
                                    </td>
                                    <td>{{ number_format($bongkardetails->sum('muatbongkar.susut'), 0, ',', '.') }} Kg</td>
                                    <td>Rp.
                                        {{ number_format(
                                            $bongkardetails->sum(function ($item) {
                                                return $item->muatbongkar->hargabeli();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(
                                            $bongkardetails->sum(function ($item) {
                                                return $item->muatbongkar->hargajual();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(
                                            $bongkardetails->sum(function ($item) {
                                                return $item->muatbongkar->labakotor();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(
                                            $bongkardetails->sum(function ($item) {
                                                return $item->muatbongkar->totaldibayar();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(
                                            $bongkardetails->sum(function ($item) {
                                                return $item->muatbongkar->lababersih();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>

@endsection
