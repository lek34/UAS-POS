<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Models\Supplier;
use App\Models\Customers;
use App\Models\KontrakJual;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\Transaksi\KontrakJual\CreateKontrakJualRequest;
use App\Http\Requests\Admin\Transaksi\KontrakJual\UpdateKontrakJualRequest;

class KontrakJualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kontrakjuals = KontrakJual::all();
        return view('admin.transaksi.kontrakjual.index', compact('kontrakjuals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customers::all();
        return view('admin.transaksi.kontrakjual.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateKontrakJualRequest $request)
    {
        $kontrakjual = $request->validated();
        KontrakJual::insert($kontrakjual);
        // Session::flash('success', 'Data Kontrak Jual Telah Ditambah.');
        toastr()->success('Data Kontrak Jual Telah Ditambah.');
        return redirect()->route('admin.transaksi.kontrakjual.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $kontrakjual = KontrakJual::findOrFail($id);
        return view('admin.transaksi.kontrakjual.show', compact('kontrakjual'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customers = Customers::all();
        $kontrakjual = KontrakJual::findOrFail($id);
        return view('admin.transaksi.kontrakjual.edit', compact('customers', 'kontrakjual'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKontrakJualRequest $request, string $id)
    {
        $kontrakjual = $request->validated();
        KontrakJual::findOrFail($id)->update($kontrakjual);
        // Session::flash('success', 'Data Kontrak Jual Telah Ditambah.');
        toastr()->success('Data Kontrak Jual Telah Ditambah.');
        return redirect()->route('admin.transaksi.kontrakjual.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        KontrakJual::findOrFail($id)->delete();
        // Session::flash('success', 'Data Kontrak Jual Telah Dihapus.');
        toastr()->success('Data Kontrak Jual Telah Dihapus.');
        return redirect()->route('admin.transaksi.kontrakjual.index');
    }

    public function generatepdf(string $id)
    {
        $kontrakjual = KontrakJual::findOrFail($id);
        $pdf = Pdf::loadView('admin.transaksi.kontrakjual.pdf', compact('kontrakjual'));
        return $pdf->download('kontrakjual-' . $kontrakjual->no . '.pdf');
    }
    
    public function history(string $id)
    {
        $kontrakjual = KontrakJual::findOrFail($id);
        return view('admin.transaksi.kontrakjual.history', compact('kontrakjual'));
    }
}
