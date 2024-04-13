@extends('layouts.app2')

@section('title', 'Detail Kontrak Beli')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Detail Kontrak Beli</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Tanggal:</th>
                                        <td>{{ \Carbon\Carbon::parse($kontrakbeli->tanggal)->format('d F Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>No:</th>
                                        <td>{{ $kontrakbeli->no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier:</th>
                                        <td>{{ $kontrakbeli['supplier']['nama'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kg:</th>
                                        <td>{{ number_format($kontrakbeli->kg / 1000, 0, ',', '.') }} MT
                                            ({{ number_format($kontrakbeli->kg, 0, ',', '.') }} Kg)</td>
                                    </tr>
                                    <tr>
                                        <th>Harga:</th>
                                        <td>Rp. {{ number_format($kontrakbeli->harga, 0, ',', '.') }} </td>
                                    </tr>
                                    <tr>
                                        <th>Harga (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->harga)) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total:</th>
                                        <td>Rp. {{ number_format($kontrakbeli->subtotal(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->subtotal())) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>PPN Percentage:</th>
                                        <td>{{ number_format($kontrakbeli->ppnpercentage, 0, ',', '.') }}%</td>
                                    </tr>
                                    <tr>
                                        <th>PPN:</th>
                                        <td>Rp. {{ number_format($kontrakbeli->ppn(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>PPN (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->ppn())) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga:</th>
                                        <td>Rp. {{ number_format($kontrakbeli->total(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga (Tebilang):</th>
                                        <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->total())) }} Rupiah</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('admin.transaksi.kontrakbeli.index') }}" class="btn btn-primary">Back</a>
                        <a href="{{ route('admin.transaksi.kontrakbeli.generate.pdf', $kontrakbeli->id) }}"
                            class="btn btn-secondary">Generate PDF</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
