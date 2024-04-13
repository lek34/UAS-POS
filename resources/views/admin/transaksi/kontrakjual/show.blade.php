@extends('layouts.app2')

@section('title', 'Detail Kontrak Jual')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Detail Kontrak Jual</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Tanggal:</th>
                                        <td>{{ \Carbon\Carbon::parse($kontrakjual->tanggal)->format('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>No:</th>
                                        <td>{{ $kontrakjual->no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier:</th>
                                        <td>{{ $kontrakjual['customer']['nama'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kg:</th>
                                        <td>{{ number_format($kontrakjual->kg / 1000, 0, ',', '.') }} MT
                                            ({{ number_format($kontrakjual->kg, 0, ',', '.') }} Kg)</td>
                                    </tr>
                                    <tr>
                                        <th>Harga:</th>
                                        <td>Rp. {{ number_format($kontrakjual->harga, 0, ',', '.') }} </td>
                                    </tr>
                                    <tr>
                                        <th>Harga (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->harga)) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total:</th>
                                        <td>Rp. {{ number_format($kontrakjual->subtotal(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->subtotal())) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>PPN Percentage:</th>
                                        <td>{{ number_format($kontrakjual->ppnpercentage, 0, ',', '.') }}%</td>
                                    </tr>
                                    <tr>
                                        <th>PPN:</th>
                                        <td>Rp. {{ number_format($kontrakjual->ppn(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>PPN (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->ppn())) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga:</th>
                                        <td>Rp. {{ number_format($kontrakjual->total(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->total())) }} Rupiah</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('admin.transaksi.kontrakbeli.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
