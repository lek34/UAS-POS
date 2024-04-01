<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\Supplier\CreateSupplierRequest;
use App\Http\Requests\Admin\Master\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $suppliers = Supplier::all();
        return view('admin.master.supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.master.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplierRequest $request)
    {
        //
        $supplier = $request->validated();
        Supplier::insert($supplier);
        // Session::flash('success', 'Data Supplier Telah Ditambah.');
        toastr()->success('Data Supplier Telah Ditambah.');
        return redirect()->route('admin.master.supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        return view('admin.master.supplier.show',compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        return view('admin.master.supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        //
        $supplier = $request->validated();
        Supplier::findOrFail($id)->update($supplier);
        // Session::flash('success', 'Data Supplier Telah Diubah.');
        toastr()->success('Data Data Supplir Telah Diubah.');
        return redirect()->route('admin.master.supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Supplier::findOrFail($id)->delete();
        // Session::flash('success', 'Data Supplier Telah Dihapus.');
        toastr()->success('Data Supplier Telah Dihapus.');
        return redirect()->route('admin.master.supplier.index');
    }
}
