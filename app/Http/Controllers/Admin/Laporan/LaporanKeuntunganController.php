<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Laporan\GenerateKeuntunganRequest;
use App\Models\BongkarDetail;
use Illuminate\Http\Request;

class LaporanKeuntunganController extends Controller
{
    //
    public function index()
    {
        return view('admin.laporan.keuntungan.index');
    }
    public function generate(GenerateKeuntunganRequest $request)
    {
        $generate = $request->validated();
        $bongkardetails = BongkarDetail::whereBetween('tanggal', [$generate['tanggalawal'], $generate['tanggalakhir']])->get();
        return view('admin.laporan.keuntungan.generate', compact('bongkardetails'));
    }
}
