@extends('layouts.app2')

@section('title', ' History Kontrak Jual', $kontrakjual->no)
@section('content')
    {{-- @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kontrak Jual {{ $kontrakjual->no }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>No Pengiriman</th>
                                    <th>Total Bongkar</th>
                                    <th>Sisa Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4" class="text-bold text-center">Stok Awal</td>
                                    <td class="text-bold">{{ number_format($kontrakjual->kg, 0, ',', '.') }} Kg</td>
                                </tr>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($kontrakjual->bongkardetail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->muatbongkar->no }}</td>
                                        <td>{{ number_format($item->netto, 0, ',', '.') }} Kg</td>
                                        @php
                                            $total += $item->netto;
                                        @endphp
                                        <td class="text-bold">{{ number_format($kontrakjual->kg - $total, 0, ',', '.') }} Kg
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" class="text-center text-bold">Stok Akhir</td>
                                    <td class="text-bold">{{ number_format($kontrakjual->kg - $total, 0, ',', '.') }} Kg
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
