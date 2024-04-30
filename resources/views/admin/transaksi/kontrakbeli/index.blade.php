@extends('layouts.app2')

@section('title', 'Kontrak Beli')
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
                        <h3 class="card-title">Data Kontrak Beli</h3>
                        <a href="{{ route('admin.transaksi.kontrakbeli.create') }}" class="btn btn-success btn-sm float-right"
                            title="Add New Supplier">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example4" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tanggal</th>
                                    <th>No</th>
                                    <th>Supplier</th>
                                    <th>Kg</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                    <th>PPN</th>
                                    <th>Total</th>
                                    <th>Sisa Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kontrakbelis as $kontrakbeli)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kontrakbeli->tanggal }}</td>
                                        <td>{{ $kontrakbeli->no }}</td>
                                        <td>{{ $kontrakbeli->supplier->nama }}</td>
                                        <td>{{ number_format($kontrakbeli->kg, 0, ',', '.') }}</td>
                                        <td>{{ number_format($kontrakbeli->harga, 0, ',', '.') }}</td>
                                        <td>{{ number_format($kontrakbeli->subtotal(), 0, ',', '.') }}</td>
                                        <td>{{ number_format($kontrakbeli->ppn(), 0, ',', '.') }}</td>
                                        <td>{{ number_format($kontrakbeli->total(), 0, ',', '.') }}</td>
                                        <td>{{ number_format($kontrakbeli->sisastok(), 0, ',', '.') }}</td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.transaksi.kontrakbeli.show', $kontrakbeli->id) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.transaksi.kontrakbeli.edit', $kontrakbeli->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <button type="button" data-toggle="modal"
                                                data-target="#delete{{ $kontrakbeli->id }}"
                                                class="btn btn-danger btn-sm delete">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.transaksi.kontrakbeli.history', $kontrakbeli->id) }}">
                                                <i class="fas fa-history">
                                                </i>
                                                History
                                            </a>
                                            <button type="button" data-toggle="modal"
                                                data-target="#payment{{ $kontrakbeli->id }}"
                                                class="btn btn-success btn-sm delete">
                                                <i class="fas fa-file-invoice"> </i>Payment
                                            </button>
                                        </td>
                                    </tr>
                                    <x-confirm-delete :id="$kontrakbeli->id" :route="route('admin.transaksi.kontrakbeli.delete', $kontrakbeli->id)" :model="$kontrakbeli"
                                        :modelAttribute="'no'" />
                                    <x-payment :id="$kontrakbeli->id" :route="route('admin.transaksi.payment.kontrakbeli.store', $kontrakbeli->id)" :model="$kontrakbeli" :kontrak="'kontrak_beli_id'"
                                        :modelAttribute="'no'" />
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
