<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transaksi\KontrakBeli\CreateKontrakBeliRequest;
use App\Http\Requests\Admin\Transaksi\KontrakBeli\UpdateKontrakBeliRequest;
use App\Models\KontrakBeli;
use App\Models\Supplier;
use Illuminate\Support\Facades\Session;

class KontrakBeliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kontrakbelis = KontrakBeli::all();
        return view('admin.transaksi.kontrakbeli.index',compact('kontrakbelis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $suppliers = Supplier::all();
        return view('admin.transaksi.kontrakbeli.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateKontrakBeliRequest $request)
    {
        //
        $kontrakbeli = $request->validated();
        KontrakBeli::insert($kontrakbeli);
        // Session::flash('success', 'Data Kontrak Beli Telah Ditambah.');
        toastr()->success('Data Kontrak Beli Telah Ditambah.');
        return redirect()->route('admin.transaksi.kontrakbeli.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kontrakbeli = KontrakBeli::findOrFail($id);
        return view('admin.transaksi.kontrakbeli.show', compact('kontrakbeli'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $suppliers = Supplier::all();
        $kontrakbeli = KontrakBeli::findOrFail($id);
        return view('admin.transaksi.kontrakbeli.edit', compact('suppliers','kontrakbeli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKontrakBeliRequest $request, string $id)
    {
        //
        $kontrakbeli = $request->validated();
        KontrakBeli::findOrFail($id)->update($kontrakbeli);
        // Session::flash('success', 'Data Kontrak Beli Telah Diubah.');
        toastr()->success('Data Kontrak Beli Telah Diubah.');
        return redirect()->route('admin.transaksi.kontrakbeli.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        KontrakBeli::findOrFail($id)->delete();
        // Session::flash('success', 'Data Kontrak Beli Telah Dihapus.');
        toastr()->success('Data Kontrak Beli Telah Dihapus.');
        return redirect()->route('admin.transaksi.kontrakbeli.index');
    }
}
