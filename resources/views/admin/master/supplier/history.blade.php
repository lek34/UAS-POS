@extends('layouts.app2')

@section('title', ' History Supplier', $supplier->nama)
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
                        <h3 class="card-title">Data Supplier {{ $supplier->nama }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>No</th>
                                    <th>Kg</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                    <th>PPN</th>
                                    <th>Total</th>
                                    <th>Sisa Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <td colspan="4" class="text-bold text-center">Stok Awal</td>
                                    <td class="text-bold">{{ number_format($kontrakjuals->kg, 0, ',', '.') }} Kg</td>
                                </tr>
                                @php
                                    $total = 0;
                                @endphp --}}
                                    @foreach ($supplier->kontrakbeli as $kontrakbeli)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kontrakbeli->tanggal }}</td>
                                            <td>{{ $kontrakbeli->no }}</td>
                                            <td>{{ number_format($kontrakbeli->kg, 0, ',', '.') }}</td>
                                            <td>{{ number_format($kontrakbeli->harga, 0, ',', '.') }}</td>
                                            <td>{{ number_format($kontrakbeli->subtotal(), 0, ',', '.') }}</td>
                                            <td>{{ number_format($kontrakbeli->ppn(), 0, ',', '.') }}</td>
                                            <td>{{ number_format($kontrakbeli->total(), 0, ',', '.') }}</td>
                                            <td>{{ number_format($kontrakbeli->sisastok(), 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                            <tfoot>
                                {{-- <tr>
                                    <td colspan="4" class="text-center text-bold">Stok Akhir</td>
                                    <td class="text-bold">{{ number_format($kontrakjual->kg - $total, 0, ',', '.') }} Kg
                                    </td>
                                </tr> --}}
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
