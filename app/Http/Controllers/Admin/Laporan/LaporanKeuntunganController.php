<?php

namespace App\Http\Controllers\Admin\Laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanKeuntunganController extends Controller
{
    //
    public function index()
    {
        return view('admin.laporan.keuntungan.index');
    }
    public function generate()
    {

    }
}
