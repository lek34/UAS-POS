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
                            <input type="text" name="tableData1" id="tableData1" value="">
                            <input type="text" name="tableData2" id="tableData2" value="">
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
                                            @foreach ($kontrakbelis as $kontrakbeli)
                                                <option value="{{ $kontrakbeli->id }}">{{ $kontrakbeli->no }}</option>
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
                                            placeholder="Masukkan Netto" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        {{-- <input style="margin-top: 5px" class="btn btn-success" type="submit" value="Tambah"> --}}

                                        <button type="button" style="margin-top: 32px" class="btn btn-success"
                                            onclick="addRow1()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    <!-- Table to display added items -->
                                    <table class="table" id="itemTable1">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">id</th>
                                                <th>Tanggal</th>
                                                <th>No</th>
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
                            <hr>
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
                                        <button type="button" style="margin-top: 32px" class="btn btn-success"
                                            onclick="addRow2()"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4 mb-4">
                                <div class="col-md-12">
                                    <!-- Table to display added items -->
                                    <table class="table" id="itemTable2">
                                        <thead>
                                            <tr>
                                                <th style="display: none;">id</th>
                                                <th>Tanggal</th>
                                                <th>No</th>
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
                            <hr>
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
                                                            name="potsusut" value="0">
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
                                                            name="ongkos" value="0">
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
                                                        <input type="text" name="total_potsusut" id="total_potsusut"
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
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="pph"
                                                            name="pph" value="0">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                    </div>
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
                            <div class="form-group float-right">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                    </div>
                </div>

                </form>

            </div>
        </div>
        </form>
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
    <script>
        $(document).ready(function() {
            // const data = [];

            function maskingNumber() {
                var totalbrutomuat = parseInt($('#brutomuat').val().replace(/\D/g, ''), 10);
                $('#brutomuat').val(formatNumber(totalbrutomuat));

                var totaltarramuat = parseInt($('#tarramuat').val().replace(/\D/g, ''), 10);
                $('#tarramuat').val(formatNumber(totaltarramuat));

                var totalnettomuat = parseInt($('#nettomuat').val().replace(/\D/g, ''), 10);
                $('#nettomuat').val(formatNumber(totalnettomuat));

                var totalbrutobongkar = parseInt($('#brutobongkar').val().replace(/\D/g, ''), 10);
                $('#brutobongkar').val(formatNumber(totalbrutobongkar));

                var totaltarrabongkar = parseInt($('#tarrabongkar').val().replace(/\D/g, ''), 10);
                $('#tarrabongkar').val(formatNumber(totaltarrabongkar));

                var totalnettobongkar = parseInt($('#nettobongkar').val().replace(/\D/g, ''), 10);
                $('#nettobongkar').val(formatNumber(totalnettobongkar));

                var totalmuat = parseInt($('#muat').val().replace(/\D/g, ''), 10);
                $('#muat').val(formatNumber(totalmuat));

                var totalbongkar = parseInt($('#bongkar').val().replace(/\D/g, ''), 10);
                $('#bongkar').val(formatNumber(totalbongkar));
            }

            function formatNumber(number) {
                return number.toLocaleString('id-ID', {
                    maximumFractionDigits: 2
                });
            }

            function calculateTotalNetto() {



                var brutomuat = parseFloat($('#brutomuat').val().replaceAll('.', '') || 0);
                var tarramuat = parseFloat($('#tarramuat').val().replaceAll('.', '') || 0);

                var brutobongkar = parseFloat($('#brutobongkar').val().replaceAll('.', '') || 0);
                var tarrabongkar = parseFloat($('#tarrabongkar').val().replaceAll('.', '') || 0);

                // Calculate subtotal
                var nettomuat = brutomuat - tarramuat;
                $('#nettomuat').val(formatNumber(nettomuat));

                var nettobongkar = brutobongkar - tarrabongkar;
                $('#nettobongkar').val(formatNumber(nettobongkar));

            }


            $('#brutomuat, #tarramuat,#brutobongkar, #tarrabongkar').on('input', function() {
                maskingNumber();
                calculateTotalNetto();
            });
            $('#nettomuat,#nettobongkar,#susut').on('input', function() {
                maskingNumber();
            });
            $('#potsusut').on('input', function() {
                var susut = parseFloat($('#susut').val().replaceAll('.', '') || 0);
                var potsusut = parseFloat($('#potsusut').val().replaceAll('.', '') || 0);

                var totalpotsusut = susut * potsusut;
                $('#total_potsusut').val(formatNumber(totalpotsusut));


            });
            $('#ongkos').on('input', function() {
                var bongkar = parseFloat($('#bongkar').val().replaceAll('.', '') || 0);
                var ongkos = parseFloat($('#ongkos').val().replaceAll('.', '') || 0);
                var totalPotSusut = parseFloat($('#total_potsusut').val().replaceAll('.', '') || 0);
                var totalOngkos = bongkar * ongkos;
                $('#total_ongkos').val(formatNumber(totalOngkos));


                $('#total_harga').val(formatNumber(totalOngkos - totalPotSusut));

            });
            $('#pph').on('input', function() {
                var totalHarga = parseFloat($('#total_harga').val().replaceAll('.', '') || 0);
                var pph = parseFloat($('#pph').val().replaceAll('.', '') || 0);

                var totalPph = totalHarga * pph / 100;
                var totalDibayar = totalHarga - totalPph;
                $('#total_pph').val(formatNumber(totalPph));
                $('#total_dibayar').val(formatNumber(totalDibayar));

            });
            $('#form').on('submit', function() {
                const data = getTableData();
                console.log(data);
                var totalHarga = parseFloat($('#total_harga').val().replaceAll('.', '') || 0);
                var nettomuat = parseFloat($('#nettomuat').val().replaceAll('.', '') || 0);
                var nettobongkar = parseFloat($('#nettobongkar').val().replaceAll('.', '') || 0);
                var total_dibayar = parseFloat($('#total_dibayar').val().replaceAll('.', '') || 0);
                var total_pph = parseFloat($('#total_pph').val().replaceAll('.', '') || 0);
                var total_ongkos = parseFloat($('#total_ongkos').val().replaceAll('.', '') || 0);
                var susut = parseFloat($('#susut').val().replaceAll('.', '') || 0);
                var potsusut = parseFloat($('#potsusut').val().replaceAll('.', '') || 0);
                var total_potsusut = parseFloat($('#total_potsusut').val().replaceAll('.', '') || 0);
            });
        });


        function extractNumericValue(value) {
            // Extract numeric value from a string (assuming 'Rp. xxx' format)
            return parseFloat(value.replace('Rp ', '').replace(',', ''));
        }


        // function getTableData() {
        //     // document.getElementById("tableData").value = tableToJSON();
        //     // console.log(tableToJSON(document.getElementById('itemTable')))
        //     document.getElementById("tableData").value = formatTableToJson(document.getElementById('itemTable'))
        //     console.log(formatTableToJson(document.getElementById('itemTable')))
        // }


        function pushItemToArray1() {
            var table = document.getElementById("itemTable1");
            var dataArray = [];

            // Iterate over rows in the table
            for (var i = 1; i < table.rows.length; i++) {
                var row = table.rows[i];
                var rowData = {};

                // Iterate over cells in the row
                for (var j = 0; j < row.cells.length - 1; j++) { // Exclude the last cell containing the delete button
                    var cell = row.cells[j];
                    var cellText = cell.textContent.trim(); // Get the trimmed text content of the cell
                    var columnHeader = table.rows[0].cells[j].textContent.trim(); // Get the corresponding header text

                    // If the cell is in column 5 or 6, trim any word and periods
                    if (j === 3 || j === 4 || j === 5) {
                        cellText = cellText.replace(/Rp|\./g, "");
                    }
                    // Add the cell value to the rowData object with the header as key
                    rowData[columnHeader] = cellText;
                }

                // Push rowData object to the dataArray
                dataArray.push(rowData);

            }
            console.log(dataArray);
            return dataArray;
        }

        function pushItemToArray2() {
            var table = document.getElementById("itemTable2");
            var dataArray = [];

            // Iterate over rows in the table
            for (var i = 1; i < table.rows.length; i++) {
                var row = table.rows[i];
                var rowData = {};

                // Iterate over cells in the row
                for (var j = 0; j < row.cells.length - 1; j++) { // Exclude the last cell containing the delete button
                    var cell = row.cells[j];
                    var cellText = cell.textContent.trim(); // Get the trimmed text content of the cell
                    var columnHeader = table.rows[0].cells[j].textContent.trim(); // Get the corresponding header text

                    // If the cell is in column 5 or 6, trim any word and periods
                    if (j === 3 || j === 4 || j === 5) {
                        cellText = cellText.replace(/Rp|\./g, "");
                    }
                    // Add the cell value to the rowData object with the header as key
                    rowData[columnHeader] = cellText;
                }

                // Push rowData object to the dataArray
                dataArray.push(rowData);

            }
            console.log(dataArray);
            return dataArray;
        }

        // function refetch() {
        //     // Data JSON dari variabel atau sumber data lainnya
        //     var jsonString = document.getElementById("tableData").value;

        //     // Parse the JSON string into a JSON object
        //     var jsonData = JSON.parse(jsonString);
        //     console.log(jsonData)

        //     // Ambil tabel HTML
        //     var table = document.getElementById("itemTable");

        //     for (var index = 0; index < jsonData.length; index++) {
        //         (function(index) {
        //             var item = jsonData[index];
        //             // Buat baris baru dalam tabel
        //             var row = table.insertRow();

        //             // Masukkan nilai-nilai ke dalam sel-sel baris tersebut
        //             var cell0 = row.insertCell(0);
        //             var cell1 = row.insertCell(1);
        //             var cell2 = row.insertCell(2);
        //             var cell3 = row.insertCell(3);
        //             var cell4 = row.insertCell(4);
        //             var cell5 = row.insertCell(5);
        //             var cell6 = row.insertCell(6);
        //             var cell7 = row.insertCell(7);

        //             cell0.textContent = item.id;
        //             cell0.style.display = 'none';
        //             cell1.textContent = item.Item;
        //             cell2.textContent = item.Merk;
        //             cell3.textContent = item.QTY;
        //             cell4.textContent = item.Uom;
        //             var hargaFormatted = parseFloat(item.Harga).toLocaleString('id-ID');
        //             var totalFormatted = parseFloat(item.Total).toLocaleString('id-ID');
        //             cell5.textContent = 'Rp. ' + hargaFormatted;
        //             cell6.textContent = 'Rp. ' + totalFormatted;
        //             cell7.innerHTML =
        //                 '<button type="button" class="btn btn-danger btn-sm mt-4" onclick="deleteOldRow(this)">Delete</button>';
        //             cell7.setAttribute("data-index", index); // Set custom attribute to store the index
        //         })(index);
        //     }
        //     // console.log(document.getElementById("tableData").value)
        // }


        // window.onload = function() {
        //     refetch();
        //     updateTotals();
        // };


        function addRow1() {
            // const data = [];
            // Get values from the input fields
            var tanggal_muat = document.getElementById("tanggal_muat");
            var kontrak_beli_id = document.getElementById("kontrak_beli_id");
            var brutomuat = document.getElementById("brutomuat");
            var tarramuat = document.getElementById("tarramuat");
            var nettomuat = document.getElementById("nettomuat");

            // Create a new row in the table
            var table = document.getElementById("itemTable1");
            var row = table.insertRow(table.rows.length);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            var cell5 = row.insertCell(5);
            var cell6 = row.insertCell(6);

            // Disable the input fields after adding an item
            // document.getElementById("id_supplier").value = document.getElementById('id_supp').value
            // document.getElementById("tanggal").readOnly = true;

            // document.getElementById("id_supp").disabled = true;
            // document.getElementById("jatuh_tempo").readOnly = true;
            // Get existing table data (if any)

            // Set the cell values
            cell0.innerHTML = kontrak_beli_id.options[kontrak_beli_id.selectedIndex].value;
            cell0.style.display = 'none'
            cell1.innerHTML = tanggal_muat.value;
            cell2.innerHTML = kontrak_beli_id.options[kontrak_beli_id.selectedIndex].text;
            // cell2.innerHTML =  '<span class="clickable" onclick="fetchHistoryPembelian('+barang.options[barang.selectedIndex].value+')">' + barang.options[barang.selectedIndex].text + '</span>';
            cell3.innerHTML = brutomuat.value;
            cell4.innerHTML = tarramuat.value;
            cell5.innerHTML = nettomuat.value;
            cell6.innerHTML =
                '<button type="button" class="btn btn-danger btn-sm" onclick="deleteRow1(this)">Delete</button>';

            // Clear input fields after adding a row
            $("#kontrak_beli_id").val(null).trigger("change");
            tanggal_muat.value = "";
            brutomuat.value = "";
            tarramuat.value = "";
            nettomuat.value = "";

            // Call pushItemToArray to get the table data as an array of objects

            var tableDataArray = pushItemToArray1();

            // Convert the array of objects to a JSON string
            var jsonDataString = JSON.stringify(tableDataArray);

            // Set the JSON string as the value of the hidden input field
            document.getElementById("tableData1").value = jsonDataString;

            updateTotals1();
        }

        function addRow2() {
            // const data = [];
            // Get values from the input fields
            var tanggal_bongkar = document.getElementById("tanggal_bongkar");
            var kontrak_jual_id = document.getElementById("kontrak_jual_id");
            var brutobongkar = document.getElementById("brutobongkar");
            var tarrabongkar = document.getElementById("tarrabongkar");
            var nettobongkar = document.getElementById("nettobongkar");

            // Create a new row in the table
            var table = document.getElementById("itemTable2");
            var row = table.insertRow(table.rows.length);
            var cell0 = row.insertCell(0);
            var cell1 = row.insertCell(1);
            var cell2 = row.insertCell(2);
            var cell3 = row.insertCell(3);
            var cell4 = row.insertCell(4);
            var cell5 = row.insertCell(5);
            var cell6 = row.insertCell(6);

            // Disable the input fields after adding an item
            // document.getElementById("id_supplier").value = document.getElementById('id_supp').value
            // document.getElementById("tanggal").readOnly = true;

            // document.getElementById("id_supp").disabled = true;
            // document.getElementById("jatuh_tempo").readOnly = true;
            // Get existing table data (if any)

            // Set the cell values
            cell0.innerHTML = kontrak_jual_id.options[kontrak_jual_id.selectedIndex].value;
            cell0.style.display = 'none'
            cell1.innerHTML = tanggal_bongkar.value;
            cell2.innerHTML = kontrak_jual_id.options[kontrak_jual_id.selectedIndex].text;
            // cell2.innerHTML =  '<span class="clickable" onclick="fetchHistoryPembelian('+barang.options[barang.selectedIndex].value+')">' + barang.options[barang.selectedIndex].text + '</span>';
            cell3.innerHTML = brutobongkar.value;
            cell4.innerHTML = tarrabongkar.value;
            cell5.innerHTML = nettobongkar.value;
            cell6.innerHTML =
                '<button type="button" class="btn btn-danger btn-sm" onclick="deleteRow2(this)">Delete</button>';

            // Clear input fields after adding a row
            $("#kontrak_jual_id").val(null).trigger("change");
            tanggal_bongkar.value = "";
            brutobongkar.value = "";
            tarrabongkar.value = "";
            nettobongkar.value = "";

            // Call pushItemToArray to get the table data as an array of objects

            var tableDataArray = pushItemToArray2();

            // Convert the array of objects to a JSON string
            var jsonDataString = JSON.stringify(tableDataArray);

            // Set the JSON string as the value of the hidden input field
            document.getElementById("tableData2").value = jsonDataString;

            updateTotals2();
        }

        // function deleteOldRow(btn) {

        //     var dataIndex = btn.parentNode.getAttribute("data-index"); // Get the custom data-index attribute value
        //     var tableData = JSON.parse(document.getElementById("tableData").value);

        //     // Delete the row from the table
        //     var row = btn.parentNode.parentNode;
        //     row.parentNode.removeChild(row);

        //     // Remove the corresponding item from the jsonData array
        //     tableData.splice(dataIndex, 1);

        //     // Update the value of tableData input with the modified jsonData array
        //     document.getElementById("tableData").value = JSON.stringify(tableData);

        //     updateTotals(); // Call the function to update totals if needed
        // }

        function deleteRow1(btn) {
            // Delete the row from the table
            var row = btn.parentNode.parentNode;

            row.parentNode.removeChild(row);

            updateTotals();

        }

        function deleteRow2(btn) {
            // Delete the row from the table
            var row = btn.parentNode.parentNode;

            row.parentNode.removeChild(row);

            updateTotals();

        }

        function formatNumber(number) {
            return number.toLocaleString('id-ID', {
                maximumFractionDigits: 2
            });
        }

        function updateTotals1() {
            // Update totals
            var table = document.getElementById("itemTable1");
            var subTotal = 0;

            for (var i = 0, row; row = table.rows[i]; i++) {
                // console.log(row.cells[5].innerText.substring(3).replaceAll('.', ''));
                // Skip the header row
                if (i === 0) {
                    continue;
                }

                var sub = parseFloat(row.cells[5].innerText.replaceAll('.', ''));

                subTotal += sub;
            }

            // Display totals
            // document.getElementById("muat").value = formatNumber(subTotal);
            // Display totals and update value for "bongkar"
            $('#muat').val(formatNumber(subTotal)); // assuming formatNumber is defined
            var muat = parseFloat($('#muat').val().replaceAll('.', '') || 0);
            var bongkar = parseFloat($('#bongkar').val().replaceAll('.', '') || 0);

            // Calculate subtotal
            var susut = muat - bongkar;
            if (susut > 0) {
                $('#susut').val(formatNumber(susut));
            } else {
                $('#susut').val(formatNumber(0));
            }
        }

        function updateTotals2() {
            // Update totals
            var table = document.getElementById("itemTable2");
            var subTotal = 0;

            for (var i = 0, row; row = table.rows[i]; i++) {
                // console.log(row.cells[5].innerText.substring(3).replaceAll('.', ''));
                // Skip the header row
                if (i === 0) {
                    continue;
                }

                var sub = parseFloat(row.cells[5].innerText.replaceAll('.', ''));

                subTotal += sub;
            }

            // Display totals
            // document.getElementById("bongkar").value = formatNumber(subTotal);
            $('#bongkar').val(formatNumber(subTotal)); // assuming formatNumber is defined
            var muat = parseFloat($('#muat').val().replaceAll('.', '') || 0);
            var bongkar = parseFloat($('#bongkar').val().replaceAll('.', '') || 0);

            // Calculate subtotal
            var susut = muat - bongkar;
            if (susut > 0) {
                $('#susut').val(formatNumber(susut));
            } else {
                $('#susut').val(formatNumber(0));
            }
        }
    </script>
@endsection
