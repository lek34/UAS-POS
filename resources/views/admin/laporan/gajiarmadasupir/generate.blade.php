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
                        <table class="table table-bordered table-striped">
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
                                        <td>{{ $item->muat }}</td>
                                        <td>{{ $item->bongkar }}</td>
                                        <td>{{ $item->susut }}</td>
                                        <td>{{ $item->ongkos }}</td>
                                        <td>{{ $item->totalongkos() }}</td>
                                        <td>{{ $item->potsusut }}</td>
                                        <td>{{ $item->totalpotongan() }}</td>
                                        <td>{{ $item->totalongkos() }}</td>
                                        <td>{{ $item->pph() }}</td>
                                        <td>{{ $item->totaldibayar() }}</td>
                                        {{-- <td class="text-bold">{{ number_format($kontrakjual->kg - $total, 0, ',', '.') }} Kg
                                        </td> --}}
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
