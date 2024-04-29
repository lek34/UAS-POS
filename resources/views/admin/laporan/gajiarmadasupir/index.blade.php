@extends('layouts.app2')
@section('title', 'Generate Report - Gaji Armada Supir')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Generate Gaji Armada Supir Report</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.laporan.gajisupir.generate') }}" class="form-horizontal">
                            @csrf
                            <div class="row">
                                <!-- Periode Bulan filter -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tanggalawal">Tanggal Awal:</label>
                                        <input type="date" name="tanggalawal" id="tanggalawal" class="form-control"
                                            value="{{ old('tanggalawal') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tanggalakhir">Tanggal Akhir:</label>
                                        <input type="date" name="tanggalakhir" id="tanggalakhir" class="form-control"
                                            value="{{ old('tanggalakhir') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="armada">Armada:</label>
                                        <select class="form-control select2bs4" id="armada" name="armada"
                                            style="width: 100%;">
                                            <option disabled selected value> -- Pilih Armada -- </option>
                                            @foreach ($armadas as $armada)
                                                <option value="{{ $armada->id }}">{{ $armada->plat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="supir">Supir:</label>
                                        <select class="form-control select2bs4" id="supir" name="supir"
                                            style="width: 100%;">
                                            <option disabled selected value> -- Pilih Supir -- </option>
                                            @foreach ($supirs as $supir)
                                                <option value="{{ $supir->id }}">{{ $supir->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group float-right">
                                        <button type="submit" class="btn btn-primary">Generate Report</button>
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
