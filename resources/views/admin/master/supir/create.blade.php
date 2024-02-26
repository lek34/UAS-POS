@extends('layouts.app2')
@section('title', 'Supir')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Supir</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{route('admin.master.supir.store')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="plat">Nama:</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama">
                                        @error('nama')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="alias">No Sim:</label>
                                        <input type="text" name="no_sim" id="no_sim" class="form-control" placeholder="Masukkan No Sim">
                                        @error('no_sim')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="merk">No KTP:</label>
                                        <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="Masukkan No KTP">
                                        @error('no_ktp')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group float-left">
                                        <input class="btn btn-primary" type="submit" value="Tambah">
                                        <a href="{{route('admin.master.supir.index')}}" class="btn btn-danger">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
