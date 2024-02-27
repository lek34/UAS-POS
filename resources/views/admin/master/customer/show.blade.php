@extends('layouts.app2')

@section('title', 'Customer')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer {{$customer->nama}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width: 20%">ID</th>
                                <td>{{$customer->id}}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>{{$customer->nama}}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{$customer->alamat}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$customer->email}}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>{{$customer->notelp}}</td>
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
