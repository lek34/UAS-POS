@extends('layouts.app2')
@section('title', 'Muat Bongkar')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Muat Bongkar</h3>
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

                        <form method="POST" action="{{ route('admin.transaksi.muatbongkar.store') }}" accept-charset="UTF-8"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no">No Pengiriman:</label>
                                        <input type="text" name="no" id="no" class="form-control"
                                            value="{{ old('no') }}" placeholder="Masukkan Nomor Pengiriman">
                                        @error('no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="supplier">Armada:</label>
                                        <select class="form-control select2bs4" id="armada_id" name="armada_id"
                                            style="width: 100%;">
                                            <option disabled selected value> -- Pilih Armada -- </option>
                                            @foreach ($armadas as $armada)
                                                <option value="{{ $armada->id }}">{{ $armada->plat }} -
                                                    {{ $armada->alias }}</option>
                                            @endforeach
                                        </select>
                                        @error('armada_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="supplier">Supir:</label>
                                        <select class="form-control select2bs4" id="supir_id" name="supir_id"
                                            style="width: 100%;">
                                            <option disabled selected value> -- Pilih Supir -- </option>
                                            @foreach ($supirs as $supir)
                                                <option value="{{ $supir->id }}">{{ $supir->nama }} -
                                                    {{ $supir->no_ktp }}</option>
                                            @endforeach
                                        </select>
                                        @error('supir_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h3>Tambah Muat</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="tanggal_muat">Tanggal Muat:</label>
                                        <input type="date" name="tanggal_muat" id="tanggal_muat"
                                            value="{{ old('tanggal_muat') }}" class="form-control">
                                        @error('tanggal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kontrak_beli_id">Kontrak Beli:</label>
                                        <select class="form-control select2bs4" id="kontrak_beli_id" name="kontrak_beli_id"
                                            style="width: 100%;">
                                            <option disabled selected value> -- Pilih Kontrak Beli -- </option>
                                            @foreach ($kontrakjuals as $kontrakjual)
                                                <option value="{{ $kontrakjual->id }}">{{ $kontrakjual->no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="brutomuat">Bruto:</label>
                                        <input type="number" name="brutomuat" id="brutomuat" class="form-control"
                                            placeholder="Masukkan Bruto">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="tarramuat">Tarra:</label>
                                        <input type="number" name="tarramuat" id="tarramuat" class="form-control"
                                            placeholder="Masukkan Tarra">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nettomuat">Netto:</label>
                                        <input type="number" name="nettomuat" id="nettomuat" class="form-control"
                                            placeholder="Masukkan Netto">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        {{-- <input style="margin-top: 5px" class="btn btn-success" type="submit" value="Tambah"> --}}
                                        <button style="margin-top: 32px" class="btn btn-success" type="submit"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <h3>Tambah Bongkar</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="tanggal_bongkar">Tanggal Bongkar:</label>
                                        <input type="date" name="tanggal_bongkar" id="tanggal_bongkar"
                                            value="{{ old('tanggal_bongkar') }}" class="form-control">
                                        @error('tanggal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="kontrak_jual_id">Kontrak Jual:</label>
                                        <select class="form-control select2bs4" id="kontrak_jual_id"
                                            name="kontrak_jual_id" style="width: 100%;">
                                            <option disabled selected value> -- Pilih Kontrak Jual -- </option>
                                            @foreach ($kontrakjuals as $kontrakjual)
                                                <option value="{{ $kontrakjual->id }}">{{ $kontrakjual->no }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="brutobongkar">Bruto:</label>
                                        <input type="number" name="brutobongkar" id="brutobongkar" class="form-control"
                                            placeholder="Masukkan Bruto">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="tarrabongkar">Tarra:</label>
                                        <input type="number" name="tarrabongkar" id="tarrabongkar" class="form-control"
                                            placeholder="Masukkan Tarra">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nettobongkar">Netto:</label>
                                        <input type="number" name="nettobongkar" id="nettobongkar" class="form-control"
                                            placeholder="Masukkan Netto">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        {{-- <input style="margin-top: 5px" class="btn btn-success" type="submit" value="Tambah"> --}}
                                        <button style="margin-top: 32px" class="btn btn-success" type="submit"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group float-right">
                                        <input class="btn btn-primary" type="submit" value="Tambah">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            calculateTotal();

            function formatNumber(number) {
                return number.toLocaleString('id-ID');
            }

            function calculateTotal() {
                var kg = parseFloat($('#kg').val());
                var harga = parseFloat($('#harga').val());
                var ppnpercentage = parseFloat($('#ppnpercentage').val());

                // Calculate subtotal
                var subtotal = kg * harga;
                $('#subtotal').val(formatNumber(subtotal));

                // Calculate PPN
                var ppn = (subtotal * (ppnpercentage / 100));
                $('#ppn').val(formatNumber(ppn));

                // Calculate total
                var total = subtotal - ppn;
                $('#totalharga').val(formatNumber(total));
            }

            $('#kg, #harga, #ppnpercentage').on('input', function() {
                calculateTotal();
            });
        });
    </script>
@endsection
