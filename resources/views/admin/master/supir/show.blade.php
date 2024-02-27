@extends('layouts.app2')

@section('title', 'supir')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Supir {{$supirs->nama}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width: 20%">ID</th>
                                <td>{{$supirs->id}}</td>
                            </tr>
                            <tr>
                                <th>Plat</th>
                                <td>{{$supirs->nama}}</td>
                            </tr>
                            <tr>
                                <th>Alias</th>
                                <td>{{$supirs->no_sim}}</td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td>{{$supirs->no_ktp}}</td>
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
