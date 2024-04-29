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
                                        <td>{{ $item->muatbongkar->muat }}</td>
                                        <td>{{ $item->muatbongkar->bongkar }}</td>
                                        <td>{{ $item->muatbongkar->susut }}</td>
                                        <td>{{ $item->muatbongkar->hargabeli() }}</td>
                                        <td>{{ $item->muatbongkar->hargajual() }}</td>
                                        <td>{{ $item->muatbongkar->labakotor() }}</td>
                                        <td>{{ $item->muatbongkar->totaldibayar() }}</td>
                                        <td>{{ $item->muatbongkar->lababersih() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
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
