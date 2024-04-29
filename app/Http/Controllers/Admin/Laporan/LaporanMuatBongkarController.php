<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Laporan\GenerateLaporanMuatBongkarRequest;
use App\Models\BongkarDetail;
use Illuminate\Http\Request;

class LaporanMuatBongkarController extends Controller
{
    //
    public function index()
    {
        return view('admin.laporan.muatbongkar.index');
    }
    public function generate(GenerateLaporanMuatBongkarRequest $request)
    {
        $generate = $request->validated();
        $bongkardetails = BongkarDetail::whereBetween('tanggal', [$generate['tanggalawal'], $generate['tanggalakhir']])->get();
        return view('admin.laporan.muatbongkar.generate', compact('bongkardetails'));
    }
}
