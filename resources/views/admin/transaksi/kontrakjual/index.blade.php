@extends('layouts.app2')

@section('title', 'Kontrak Jual')
@section('content')
{{-- @if(Session::has('success'))
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
                    <h3 class="card-title">Data Kontrak Jual</h3>
                    <a href="{{ route('admin.transaksi.kontrakjual.create') }}" class="btn btn-success btn-sm float-right" title="Add New Kontrak">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Kg</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>PPN</th>
                                <th>Total</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontrakjuals as $kontrakjual)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kontrakjual->tanggal}}</td>
                                <td>{{$kontrakjual->no}}</td>
                                <td>{{$kontrakjual['customer']['nama']}}</td>
                                <td>{{number_format($kontrakjual->kg, 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakjual->harga, 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakjual->subtotal(), 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakjual->ppn(), 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakjual->total(), 0, ',', '.')}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.transaksi.kontrakjual.show',$kontrakjual->id)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('admin.transaksi.kontrakjual.edit',$kontrakjual->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <button type="button" data-toggle="modal" data-target="#delete{{ $kontrakjual->id }}" class="btn btn-danger btn-sm delete">
                                        <i class="fas fa-trash"></i>Delete
                                    </button>
                                </td>
                            </tr>
                            <x-confirm-delete :id="$kontrakjual->id" :route="route('admin.transaksi.kontrakjual.destroy', $kontrakjual->id)" :model="$kontrakjual" :modelAttribute="'no'" />
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