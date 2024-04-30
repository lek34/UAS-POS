@extends('layouts.app2')

@section('title', 'Generate Report - Muat Bongkar')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Generate Report - Muat Bongkar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Truk</th>
                                    <th>Supir</th>
                                    <th>No Pengiriman</th>
                                    <th>Tanggal Muat</th>
                                    <th>Tanggal Bongkar</th>
                                    <th>Dari</th>
                                    <th>Tujuan</th>
                                    <th>Muat</th>
                                    <th>Bongkar</th>
                                    <th>Susut</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bongkardetails as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->muatbongkar->armada->plat }}</td>
                                        <td>{{ $item->muatbongkar->supir->nama }}</td>
                                        <td>{{ $item->muatbongkar->no }}</td>
                                        <td>
                                            @foreach ($item->muatbongkar->muatdetail as $detail)
                                                {{ $detail->tanggal }}
                                            @endforeach
                                        </td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>
                                            @foreach ($item->muatbongkar->muatdetail as $detail)
                                                {{ $detail->kontrakbeli->supplier->nama }}
                                            @endforeach
                                        </td>
                                        <td>{{ $item->kontrakjual->customer->nama }}</td>
                                        <td>{{ number_format($item->muatbongkar->muat, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($item->muatbongkar->bongkar, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($item->muatbongkar->susut, 0, ',', '.') }} Kg</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8" class="text-bold">Total</td>
                                    <td>{{ number_format($bongkardetails->sum('muatbongkar.muat'), 0, ',', '.') }} Kg</td>
                                    <td>{{ number_format($bongkardetails->sum('muatbongkar.bongkar'), 0, ',', '.') }} Kg
                                    </td>
                                    <td>{{ number_format($bongkardetails->sum('muatbongkar.susut'), 0, ',', '.') }} Kg</td>
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
