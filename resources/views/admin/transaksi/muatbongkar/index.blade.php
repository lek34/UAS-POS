@extends('layouts.app2')

@section('title', 'Muat Bongkar')
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
                        <h3 class="card-title">Data Muat Bongkar</h3>
                        <a href="{{ route('admin.transaksi.muatbongkar.create') }}"
                            class="btn btn-success btn-sm float-right" title="Add New Kontrak">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>No</th>
                                    <th>Plat</th>
                                    <th>Muat</th>
                                    <th>Bongkar</th>
                                    <th>Susut</th>
                                    <th>Ongkos</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($muatbongkars as $muatbongkar)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $muatbongkar->no }}</td>
                                        <td>{{ $muatbongkar->armada->alias }}</td>
                                        <td>{{ number_format($muatbongkar->muat, 0, ',', '.') }}</td>
                                        <td>{{ number_format($muatbongkar->bongkar, 0, ',', '.') }}</td>
                                        <td>{{ number_format($muatbongkar->susut, 0, ',', '.') }}</td>
                                        <td>{{ number_format($muatbongkar->ongkos, 0, ',', '.') }}</td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.transaksi.muatbongkar.show', $muatbongkar->id) }}">
                                                <i class="fas fa-folder">
                                                </i>
                                                View
                                            </a>
                                            <a class="btn btn-info btn-sm"
                                                href="{{ route('admin.transaksi.muatbongkar.edit', $muatbongkar->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form method="post"
                                                action="{{ route('admin.transaksi.muatbongkar.delete', $muatbongkar->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
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
