@extends('layouts.app2')

@section('title', 'Kontrak Beli')
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
                    <h3 class="card-title">Data Kontrak Beli</h3>
                    <a href="{{ route('admin.transaksi.kontrakbeli.create') }}" class="btn btn-success btn-sm float-right" title="Add New Supplier">
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
                                <th>Supplier</th>
                                <th>Kg</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                                <th>PPN</th>
                                <th>Total</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontrakbelis as $kontrakbeli)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$kontrakbeli->tanggal}}</td>
                                <td>{{$kontrakbeli->no}}</td>
                                <td>{{$kontrakbeli->supplier->nama}}</td>
                                <td>{{number_format($kontrakbeli->kg, 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakbeli->harga, 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakbeli->subtotal(), 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakbeli->ppn(), 0, ',', '.')}}</td>
                                <td>{{number_format($kontrakbeli->total(), 0, ',', '.')}}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.transaksi.kontrakbeli.show',$kontrakbeli->id)}}">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('admin.transaksi.kontrakbeli.edit',$kontrakbeli->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
<<<<<<< Updated upstream
                                    <form method="post" action="{{route('admin.transaksi.kontrakbeli.delete',$kontrakbeli->id)}}" accept-charset="UTF-8" style="display:inline">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger btn-sm">
                                          <i class="fas fa-trash"></i>Delete
                                      </button>
                                  </form>
                                </td>
                            </tr>
=======
                                    <button type="button" data-toggle="modal" data-target="#delete{{ $kontrakbeli->id }}" class="btn btn-danger btn-sm delete">
                                        <i class="fas fa-trash"></i>Delete
                                    </button>
                                </td>
                            </tr>
                            <x-confirm-delete :id="$kontrakbeli->id" :route="route('admin.transaksi.kontrakbeli.delete', $kontrakbeli->id)" :model="$kontrakbeli" :modelAttribute="'no'" />
>>>>>>> Stashed changes
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
