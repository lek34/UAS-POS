@extends('layouts.app2')

@section('title', 'Edit Kontrak Jual')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Kontrak Jual</h3>
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

                        <form method="POST" action="{{ route('admin.transaksi.kontrakjual.update', $kontrakjual->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal:</label>
                                        <input type="date" name="tanggal" id="tanggal" value="{{ $kontrakjual->tanggal }}" class="form-control">
                                        @error('tanggal')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="no">No:</label>
                                        <input type="text" name="no" id="no" class="form-control" value="{{ $kontrakjual->no }}" placeholder="Masukkan Nomor Invoice">
                                        @error('no')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="supplier">Customer:</label>
                                        <select class="form-control select2bs4" id="customer_id" name="customer_id" style="width: 100%;">
                                            <option disabled selected value> -- Pilih Customer -- </option>
                                            @foreach ($customers as $customer)
                                                <option value="{{ $customer->id }}" {{ $customer->id == $kontrakjual->customer_id ? 'selected' : '' }}>{{ $customer->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kg">Kg:</label>
                                        <div class="input-group">
                                            <input type="number" name="kg" id="kg" class="form-control" step="0.01" value="{{ $kontrakjual->kg }}" placeholder="Masukkan Kg">
                                            <div class="input-group-append">
                                                <span class="input-group-text">Kg</span>
                                            </div>
                                        </div>
                                        @error('kg')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga">Harga:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" name="harga" id="harga" class="form-control" value="{{ $kontrakjual->harga }}" step="0.01" placeholder="Masukkan Harga">
                                        </div>
                                        @error('harga')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="subtotal">Sub Total:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="subtotal" id="subtotal" class="form-control" step="0.01" value="{{ $kontrakjual->subtotal() }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ppnpercentage">PPN Percentage:</label>
                                        <div class="input-group">
                                            <input type="number" name="ppnpercentage" id="ppnpercentage" class="form-control" step="0.01" value="{{ $kontrakjual->ppnpercentage }}" placeholder="Masukkan PPH Perentage">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                        @error('ppnpercentage')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ppn">PPN:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="ppn" id="ppn" class="form-control" value="{{ $kontrakjual->ppn() }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="totalharga">Total Harga:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="text" name="totalharga" id="totalharga" class="form-control" value="{{ $kontrakjual->total() }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group float-right">
                                        <input class="btn btn-primary" type="submit" value="Simpan">
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
        $(document).ready(function(){
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
