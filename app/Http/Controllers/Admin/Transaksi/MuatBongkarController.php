<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\MuatBongkar;
use Illuminate\Http\Request;

class MuatBongkarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $muatbongkars = MuatBongkar::all();
        return view('admin.transaksi.muatbongkar.index', compact('muatbongkars'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.transaksi.muatbongkar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        return redirect()->route('admin.transaksi.muatbongkar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $muatbongkar = MuatBongkar::findOrFail($id);
        return view('admin.transaksi.muatbongkar.show', compact('muatbongkar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return view('admin.transaksi.muatbongkar.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return redirect()->route('admin.transaksi.muatbongkar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return redirect()->route('admin.transaksi.muatbongkar.index');
    }
}
