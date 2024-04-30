@extends('layouts.app2')

@section('title', 'Generate Report - Gaji Armada Supir')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Generate Report - Gaji Armada Supir</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Truk</th>
                                    <th>Supir</th>
                                    <th>No Pengiriman</th>
                                    <th>Muat</th>
                                    <th>Bongkar</th>
                                    <th>Susut</th>
                                    <th>OA/Kg</th>
                                    <th>Ongkos</th>
                                    <th>Potongan</th>
                                    <th>Total Potongan</th>
                                    <th>Total Ongkos</th>
                                    <th>PPH</th>
                                    <th>Total Dibayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($muatbongkars as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->armada->plat }}</td>
                                        <td>{{ $item->supir->nama }}</td>
                                        <td>{{ $item->no }}</td>
                                        <td>{{ number_format($item->muat, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($item->bongkar, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($item->susut, 0, ',', '.') }} Kg</td>
                                        <td>Rp. {{ number_format($item->ongkos, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->totalongkos(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->potsusut, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->totalpotongan(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->ongkosdipotong(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->pph(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($item->totaldibayar(), 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-bold">Total</td>
                                    <td>{{ number_format($muatbongkars->sum('muat'), 0, ',', '.') }} Kg</td>
                                    <td>{{ number_format($muatbongkars->sum('bongkar'), 0, ',', '.') }} Kg
                                    </td>
                                    <td>{{ number_format($muatbongkars->sum('susut'), 0, ',', '.') }} Kg</td>
                                    <td>Rp. {{ number_format($muatbongkars->avg('ongkos'), 0, ',', '.') }}</td>
                                    <td>Rp.
                                        {{ number_format(
                                            $muatbongkars->sum(function ($item) {
                                                return $item->totalongkos();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp. {{ number_format($muatbongkars->avg('potsusut'), 0, ',', '.') }}</td>
                                    <td>Rp.
                                        {{ number_format(
                                            $muatbongkars->sum(function ($item) {
                                                return $item->totalpotongan();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(
                                            $muatbongkars->sum(function ($item) {
                                                return $item->ongkosdipotong();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(
                                            $muatbongkars->sum(function ($item) {
                                                return $item->pph();
                                            }),
                                            0,
                                            ',',
                                            '.',
                                        ) }}
                                    </td>
                                    <td>Rp.
                                        {{ number_format(
                                            $muatbongkars->sum(function ($item) {
                                                return $item->totaldibayar();
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
