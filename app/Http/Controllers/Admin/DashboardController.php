<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Supplier;
use App\Models\Customers;
use App\Models\KontrakBeli;
use App\Models\KontrakJual;
use Illuminate\Http\Request;
use App\Models\BongkarDetail;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $kontrakbeli = KontrakBeli::count();
        $kontrakjual = KontrakJual::count();
        $customer = Customers::count();
        $supplier = Supplier::count();
        $bongkardetails = BongkarDetail::whereMonth('tanggal', Carbon::now()->month)->whereYear('tanggal', Carbon::now()->year)->get();
        $bongkardetaillast = BongkarDetail::latest()->take(10)->get();
        $kblast = KontrakBeli::latest()->first();
        $kjlast = KontrakJual::latest()->first();
        $recentkb = KontrakBeli::latest()->take(4)->get();
        $recentkj = KontrakJual::latest()->take(4)->get();
        $bongkardetailyear = BongkarDetail::whereYear('tanggal', Carbon::now()->year)->get();
        return view('dashboard', compact('kontrakbeli', 'kontrakjual', 'customer', 'supplier', 'bongkardetails', 'bongkardetaillast', 'kblast', 'kjlast', 'recentkb', 'recentkj', 'bongkardetailyear'));
    }
}
