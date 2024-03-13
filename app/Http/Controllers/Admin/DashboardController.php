<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontrakBeli;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $kontrakbeli = KontrakBeli::count();
        $kontrakjual = KontrakBeli::count();
        $customer = KontrakBeli::count();
        $supplier = KontrakBeli::count();
        return view('dashboard', compact('kontrakbeli', 'kontrakjual', 'customer', 'supplier'));
    }
}
