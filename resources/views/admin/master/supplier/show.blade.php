@extends('layouts.app2')

@section('title', 'Supplier')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Supplier {{$supplier->nama}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width: 20%">ID</th>
                                <td>{{$supplier->id}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{$supplier->nama}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$supplier->alamat}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$supplier->email}}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{$supplier->notelp}}</td>
                            </tr>
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
