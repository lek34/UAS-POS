<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Laporan\GenerateLaporanGajiSupirRequest;
use App\Models\Armada;
use App\Models\MuatBongkar;
use App\Models\Supir;
use Illuminate\Http\Request;

class LaporanGajiSupirController extends Controller
{
    //
    public function index()
    {
        $armadas = Armada::all();
        $supirs = Supir::all();
        return view('admin.laporan.gajiarmadasupir.index', compact('armadas', 'supirs'));
    }
    public function generate(GenerateLaporanGajiSupirRequest $request)
    {
        $generate = $request->validated();
        $muatbongkars = MuatBongkar::with([
            'bongkardetail' => function ($query) use ($generate) {
                // Filter bongkar_details based on tanggal
                $query->where('tanggal', [$generate['tanggalawal'], $generate['tanggalakhir']]);
            }
        ])->where('supir_id', $request->supir)->where('armada_id', $request->armada)->get();
        return view('admin.laporan.gajiarmadasupir.generate', compact('muatbongkars'));
    }
}

