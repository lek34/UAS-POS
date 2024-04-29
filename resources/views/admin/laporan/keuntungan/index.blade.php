@extends('layouts.app2')
@section('title', 'Generate Report - Keuntungan')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Generate Keuntungan Report</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.laporan.keuntungan.generate') }}" class="form-horizontal">
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
