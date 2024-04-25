@extends('layouts.app2')

@section('title', 'Invoice Muat Bongkar')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-6">
                            <h1>
                                <img src="/palm-oil.png" alt="AdminLTE Logo" style="width: 50px; height: 50px;"> CV. Putra
                                Makmur
                            </h1>
                        </div>
                        <div class="col-6">
                            <h1 class="text-right">Invoice</h1>
                            <h6 class="text-right">Ref: {{ $muatbongkar->no }}</h6>
                            <h6 class="text-right">Tanggal: {{ $muatbongkar->created_at->format('d/m/Y') }}</h6>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                            <strong>Informasi Perusahaan:</strong>
                            <address>
                                <strong>CV. Putra Makmur</strong><br>
                                Jl. Aluminium Raya no 22<br>
                                Medan, Sumatera Utara<br>
                                Phone: (62) 821-8887-8832<br>
                                Email: cvputramakmur@gmail.com
                            </address>
                        </div>
                        <div class="col-sm-6 invoice-col">
                            <strong>Pembayaran Kepada:</strong>
                            <address>
                                <strong>{{ $muatbongkar->supir->nama }}-{{ $muatbongkar->supir->no_ktp }}</strong><br>
                                Plat: {{ $muatbongkar->armada->plat }}<br>
                            </address>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <h3>Muat Detail</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:15%">Tanggal</th>
                                        <th style="width:15%">No Kontrak</th>
                                        <th style="width:40%">Dari</th>
                                        <th style="width:10%">Bruto</th>
                                        <th style="width:10%">Tarra</th>
                                        <th style="width:10%">Netto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($muatbongkar->muatdetail as $item)
                                        <tr>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->kontrakbeli->no }}</td>
                                            <td>{{ $item->kontrakbeli->supplier->nama }}</td>
                                            <td>{{ number_format($item->bruto, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->tarra, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->netto, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <h3>Bongkar Detail</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:15%">Tanggal</th>
                                        <th style="width:15%">No Kontrak</th>
                                        <th style="width:40%">Tujuan</th>
                                        <th style="width:10%">Bruto</th>
                                        <th style="width:10%">Tarra</th>
                                        <th style="width:10%">Netto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($muatbongkar->bongkardetail as $item)
                                        <tr>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->kontrakjual->no }}</td>
                                            <td>{{ $item->kontrakjual->customer->nama }}</td>
                                            <td>{{ number_format($item->bruto, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->tarra, 0, ',', '.') }}</td>
                                            <td>{{ number_format($item->netto, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <h3>Total</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Muat</th>
                                        <th>Bongkar</th>
                                        <th>Susut</th>
                                        <th>Pot Susut</th>
                                        <th>Potongan</th>
                                        <th>OA/Kg</th>
                                        <th>OA</th>
                                        <th>Total OA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ number_format($muatbongkar->muat, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($muatbongkar->bongkar, 0, ',', '.') }} Kg</td>
                                        <td>{{ number_format($muatbongkar->susut, 0, ',', '.') }} Kg</td>
                                        <td>Rp. {{ number_format($muatbongkar->potsusut, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($muatbongkar->totalpotongan(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($muatbongkar->ongkos, 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($muatbongkar->totalongkos(), 0, ',', '.') }}</td>
                                        <td>Rp. {{ number_format($muatbongkar->ongkosdipotong(), 0, ',', '.') }}</td>
                                    </tr>
                                    <!-- Loop through MuatDetails or BongkarDetails here to display items -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Total Ongkos</th>
                                        <td>Rp. {{ number_format($muatbongkar->ongkosdipotong(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>PPH Percentage</th>
                                        <td>Rp. {{ number_format($muatbongkar->pphpercentage, 0, ',', '.') }} %</td>
                                    </tr>
                                    <tr>
                                        <th>PPH</th>
                                        <td>Rp. {{ number_format($muatbongkar->pph(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Dibayar</th>
                                        <td>Rp. {{ number_format($muatbongkar->totaldibayar(), 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <!-- Add print, submit payment, and generate PDF buttons here -->
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
@endsection
