<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanGajiSupirController extends Controller
{
    //
    public function index()
    {
        return view('admin.laporan.muatbongkar.index');
    }
}

