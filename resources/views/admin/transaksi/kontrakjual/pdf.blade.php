<!DOCTYPE html>
<html>

<head>
    <title>Contract Detail</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        h1 {
            text-align: center;
        }

        th,
        td {
            padding: 8px 0;
            text-align: left;
        }

        th {
            padding-right: 20px;
            /* Adjust the padding to create space after the labels */
        }

        td {
            padding-right: 10px;
            /* Adjust the padding to create space before the values */
        }

        /* Style for colons */
        .colon {
            display: inline-block;
            width: 10px;
            /* Adjust the width as needed */
            text-align: center;
        }

        /* Signature section */
        .signature {
            margin-top: 30px;
            /* Ensure signature is at the bottom of the page */
        }

        .signature-row {
            display: flex;
            justify-content: space-between;
        }

        .signature-col {
            width: 45%;
            /* Adjust the width of each signature column */
        }

        .signature-col img {
            width: 150px;
            /* Adjust the width of the signature images */
            display: block;
            margin: 0 auto;
        }

        .signature-col p {
            text-align: center;
            margin-top: 10px;
        }

        /* Empty rows for signing */
        .empty-row {
            height: 10px;
            /* Adjust the height of each empty row */
        }
    </style>
</head>

<body>
    <h1>Kontrak Jual</h1>
    <table>
        <tr>
            <th>Tanggal</th>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($kontrakjual->tanggal)->format('d F Y') }}</td>
        </tr>
        <tr>
            <th>No</th>
            <td>:</td>
            <td>{{ $kontrakjual->no }}</td>
        </tr>
        <tr>
            <th>Customer</th>
            <td>:</td>
            <td>{{ $kontrakjual['customer']['nama'] }}</td>
        </tr>
        <tr>
            <th>Kg</th>
            <td>:</td>
            <td>{{ number_format($kontrakjual->kg / 1000, 0, ',', '.') }} MT
                ({{ number_format($kontrakjual->kg, 0, ',', '.') }} Kg)</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakjual->harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Harga (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->harga)) }} Rupiah</td>
        </tr>
        <tr>
            <th>Sub Total</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakjual->subtotal(), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Sub Total (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->subtotal())) }} Rupiah</td>
        </tr>
        <tr>
            <th>PPN Percentage</th>
            <td>:</td>
            <td>{{ number_format($kontrakjual->ppnpercentage, 0, ',', '.') }}%</td>
        </tr>
        <tr>
            <th>PPN</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakjual->ppn(), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>PPN (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->ppn())) }} Rupiah</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakjual->total(), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Harga (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakjual->total())) }} Rupiah</td>
        </tr>
    </table>

    <!-- Empty rows for signing -->
    <div class="empty-row"></div>
    <div class="empty-row"></div>
    <div class="empty-row"></div>
    <div class="empty-row"></div>

    <!-- Signature section -->
    <div class="signature">
        <div class="signature-row">
            <div class="signature-col" style="float:left">
                <p>Seller's Signature</p>
            </div>
            <div class="signature-col" style="float:right">
                <p>Buyer's Signature</p>
            </div>
        </div>
    </div>
</body>

</html>
