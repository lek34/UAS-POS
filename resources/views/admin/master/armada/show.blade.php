@extends('layouts.app2')

@section('title', 'Armada')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Armada {{$armada->plat}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width: 20%">ID</th>
                                <td>{{$armada->id}}</td>
                            </tr>
                            <tr>
                                <th>Plat</th>
                                <td>{{$armada->plat}}</td>
                            </tr>
                            <tr>
                                <th>Alias</th>
                                <td>{{$armada->alias}}</td>
                            </tr>
                            <tr>
                                <th>Merk</th>
                                <td>{{$armada->merk}}</td>
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
