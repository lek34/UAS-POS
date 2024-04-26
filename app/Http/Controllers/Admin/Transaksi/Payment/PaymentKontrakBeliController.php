<?php

namespace App\Http\Controllers\Admin\Transaksi\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transaksi\Payment\KontrakBeli\StorePaymentKontrakBeliRequest;
use App\Models\PaymentKontrakBeli;
use Illuminate\Http\Request;

class PaymentKontrakBeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentKontrakBeliRequest $request)
    {
        //
        $payment = $request->validated();
        PaymentKontrakBeli::create($payment);
        return redirect()->route('admin.transaksi.kontrakbeli.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
