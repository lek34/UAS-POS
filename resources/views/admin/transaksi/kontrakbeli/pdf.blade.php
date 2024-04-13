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
            margin-top: 50px;
            page-break-after: always;
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
            height: 30px;
            /* Adjust the height of each empty row */
        }
    </style>
</head>

<body>
    <h1>Kontrak Juak Beli</h1>
    <table>
        <tr>
            <th>Tanggal</th>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($kontrakbeli->tanggal)->format('d F Y') }}</td>
        </tr>
        <tr>
            <th>No</th>
            <td>:</td>
            <td>{{ $kontrakbeli->no }}</td>
        </tr>
        <tr>
            <th>Supplier</th>
            <td>:</td>
            <td>{{ $kontrakbeli['supplier']['nama'] }}</td>
        </tr>
        <tr>
            <th>Kg</th>
            <td>:</td>
            <td>{{ number_format($kontrakbeli->kg / 1000, 0, ',', '.') }} MT
                ({{ number_format($kontrakbeli->kg, 0, ',', '.') }} Kg)</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakbeli->harga, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Harga (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->harga)) }} Rupiah</td>
        </tr>
        <tr>
            <th>Sub Total</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakbeli->subtotal(), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Sub Total (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->subtotal())) }} Rupiah</td>
        </tr>
        <tr>
            <th>PPN Percentage</th>
            <td>:</td>
            <td>{{ number_format($kontrakbeli->ppnpercentage, 0, ',', '.') }}%</td>
        </tr>
        <tr>
            <th>PPN</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakbeli->ppn(), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>PPN (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->ppn())) }} Rupiah</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>:</td>
            <td>Rp. {{ number_format($kontrakbeli->total(), 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Total Harga (Tebilang)</th>
            <td>:</td>
            <td>{{ ucwords(\App\Helper\terbilang($kontrakbeli->total())) }} Rupiah</td>
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
            <div class="signature-col">
                <p>Seller's Signature</p>
            </div>
            <div class="signature-col">
                <p>Buyer's Signature</p>
            </div>
        </div>
    </div>
</body>

</html>
