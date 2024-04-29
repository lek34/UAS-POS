@extends('layouts.app2')

@section('title', 'Customer')
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
                        <h3 class="card-title">Data Customer</h3>
                        <a href="{{ route('admin.master.customer.create') }}" class="btn btn-success btn-sm float-right"
                            title="Add New Supplier">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Alias</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $customer->nama }}</td>
                                        <td>{{ $customer->alias }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->notelp }}</td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.master.customer.show', $customer->id) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.master.customer.edit', $customer->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.master.customer.history', $customer->id) }}">
                                                <i class="fas fa-history">
                                                </i>
                                                History
                                            </a>
                                            <!-- <form method="post" action="{{ route('admin.master.customer.delete', $customer->id) }}" accept-charset="UTF-8" style="display:inline">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm">
                                              <i class="fas fa-trash"></i>Delete
                                          </button>
                                      </form> -->
                                            <button type="button" data-toggle="modal"
                                                data-target="#delete{{ $customer->id }}"
                                                class="btn btn-danger btn-sm delete">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>

                                        </td>
                                    </tr>
                                    <x-confirm-delete :id="$customer->id" :route="route('admin.master.customer.delete', $customer->id)" :model="$customer"
                                        :modelAttribute="'nama'" />
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
