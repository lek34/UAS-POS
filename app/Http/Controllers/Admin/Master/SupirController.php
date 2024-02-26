<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Supir;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\Master\Supir\CreateSupirRequest;
use App\Http\Requests\Admin\Master\Supir\UpdateSupirRequest;

class SupirController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supirs = Supir::all();
        return view('admin.master.supir.index',compact('supirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.supir.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupirRequest $request)
    {
        $supirs = $request->validated();
        Supir::insert($supirs);
        Session::flash('success', 'Data supir Telah Ditambah.');
        return redirect()->route('admin.master.supir.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supirs = Supir::findOrFail($id);
        return view('admin.master.supir.show',compact('supirs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supirs = Supir::findOrFail($id);
        return view('admin.master.supir.edit',compact('supirs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupirRequest $request, string $id)
    {
        //
        $supirs = $request->validated();
        Supir::findOrFail($id)->update($supirs);
        Session::flash('success', 'Data Supir Telah Diubah.');
        return redirect()->route('admin.master.supir.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supir::findOrFail($id)->delete();
        Session::flash('success', 'Data Supir Telah Dihapus.');
        return redirect()->route('admin.master.supir.index');
    }
}
