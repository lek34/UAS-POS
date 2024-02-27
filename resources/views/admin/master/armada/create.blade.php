@extends('layouts.app2')
@section('title', 'Armada')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Armada</h3>
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

                        <form method="POST" action="{{route('admin.master.armada.store')}}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="plat">Plat:</label>
                                        <input type="text" name="plat" id="plat" class="form-control" placeholder="Masukkan Plat">
                                        @error('plat')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="alias">Alias:</label>
                                        <input type="text" name="alias" id="alias" class="form-control" placeholder="Masukkan Alias">
                                        @error('alias')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="merk">Merk:</label>
                                        <input type="text" name="merk" id="merk" class="form-control" placeholder="Masukkan Merk">
                                        @error('merk')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group float-left">
                                        <input class="btn btn-primary" type="submit" value="Tambah">
                                        <a href="{{route('admin.master.armada.index')}}" class="btn btn-danger">Kembali</a>
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
