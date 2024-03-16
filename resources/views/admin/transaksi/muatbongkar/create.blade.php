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
                                        <button style="margin-top: 32px" class="btn btn-success" type="submit"><i
                                                class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Table to display added items -->
                                    <table class="table" id="muatItem">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">id</th>
                                                <th>Tanggal</th>
                                                <th>Kontrak Beli</th>
                                                <th>Bruto</th>
                                                <th>Tarra</th>
                                                <th>Netto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Added items will appear here dynamically -->
                                        </tbody>
                                    </table>
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
                                        <button style="margin-top: 32px" class="btn btn-success" type="submit"><i
                                                class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Table to display added items -->
                                    <table class="table" id="bongkarItem">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">id</th>
                                                <th>Tanggal</th>
                                                <th>Kontrak Jual</th>
                                                <th>Bruto</th>
                                                <th>Tarra</th>
                                                <th>Netto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Added items will appear here dynamically -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Total Muat :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="muat"
                                                            name="muat" value="0.00" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Kg</span>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Bongkar :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="bongkar"
                                                            name="bongkar" value="0.00" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Kg</span>
                                                        </div>
                                                    </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Susut :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="susut"
                                                            name="susut" value="0.00" readonly>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Kg</span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Potongan Susut :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="potsusut"
                                                            name="potsusut" value="0.00">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Ongkos :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="ongkos"
                                                            name="ongkos" value="0.00">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Ongkos :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="total_ongkos"
                                                        name="total_ongkos" value="0.00" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Total Potongan Susut :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" name="total_ongkos" id="total_ongkos"
                                                            class="form-control" value="0.00" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Harga :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" name="total_harga" id="total_harga"
                                                            class="form-control" value="0.00" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>PPH :</th>
                                                <td>
                                                    <input type="text" class="form-control" id="pph"
                                                        name="pph" value="Rp 0.00" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total PPH :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" name="total_pph" id="total_pph"
                                                            class="form-control" value="0.00" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total Dibayar :</th>
                                                <td>
                                                    <div class="input-group">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="text" name="total_dibayar" id="total_dibayar"
                                                            class="form-control" value="0.00" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
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
