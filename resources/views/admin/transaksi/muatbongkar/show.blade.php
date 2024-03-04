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
                                        <td>{{ $kontrakjual->tanggal }}</td>
                                    </tr>
                                    <tr>
                                        <th>No:</th>
                                        <td>{{ $kontrakjual->no }}</td>
                                    </tr>
                                    <tr>
                                        <th>Supplier:</th>
                                        <td>{{ $kontrakjual['supplier']['nama'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kg:</th>
                                        <td>{{ number_format(($kontrakjual->kg/1000), 0, ',', '.') }} MT ({{ number_format($kontrakjual->kg, 0, ',', '.') }} Kg)</td>
                                    </tr>
                                    <tr>
                                        <th>Harga:</th>
                                        <td>Rp. {{ number_format($kontrakjual->harga, 0, ',', '.') }} </td>
                                    </tr>
                                    @php
                                        function terbilang($number)
                                        {
                                            $words = [
                                                '', 'satu', 'dua', 'tiga', 'empat', 'lima', 'enam', 'tujuh', 'delapan', 'sembilan', 'sepuluh',
                                                'sebelas', 'dua belas', 'tiga belas', 'empat belas', 'lima belas', 'enam belas', 'tujuh belas', 'delapan belas', 'sembilan belas'
                                            ];

                                            if ($number < 20) {
                                                return $words[$number];
                                            } elseif ($number < 100) {
                                                return $words[($number / 10)] . ' puluh ' . $words[($number % 10)];
                                            } elseif ($number < 200) {
                                                return 'seratus ' . terbilang($number - 100);
                                            } elseif ($number < 1000) {
                                                return $words[($number / 100)] . ' ratus ' . terbilang($number % 100);
                                            } elseif ($number < 2000) {
                                                return 'seribu ' . terbilang($number - 1000);
                                            } elseif ($number < 1000000) {
                                                return terbilang($number / 1000) . ' ribu ' . terbilang($number % 1000);
                                            } elseif ($number < 1000000000) {
                                                return terbilang($number / 1000000) . ' juta ' . terbilang($number % 1000000);
                                            } elseif ($number < 1000000000000) {
                                                return terbilang($number / 1000000000) . ' miliar ' . terbilang($number % 1000000000);
                                            } elseif ($number < 1000000000000000) {
                                                return terbilang($number / 1000000000000) . ' triliun ' . terbilang($number % 1000000000000);
                                            } else {
                                                return '';
                                            }
                                        }
                                    @endphp
                                    <tr>
                                        <th>Harga (Tebilang):</th>
                                        <td>{{ ucwords(terbilang($kontrakjual->harga)) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total:</th>
                                        <td>Rp. {{ number_format($kontrakjual->subtotal(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sub Total (Tebilang):</th>
                                        <td>{{ ucwords(terbilang($kontrakjual->subtotal())) }} Rupiah</td>
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
                                        <td>{{ ucwords(terbilang($kontrakjual->ppn())) }} Rupiah</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga:</th>
                                        <td>Rp. {{ number_format($kontrakjual->total(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga (Tebilang):</th>
                                        <td>{{ ucwords(terbilang($kontrakjual->total())) }} Rupiah</td>
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
