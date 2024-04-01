<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Master\Customer\CreateCustomerRequest;
use App\Http\Requests\Admin\Master\Customer\UpdateCustomerRequest;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();
        return view('admin.master.customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $customers = $request->validated();
        Customers::insert($customers);
        // Session::flash('success', 'Data Customer Telah Ditambah.');
        toastr()->success('Data Customer Telah Ditambah.');
        return redirect()->route('admin.master.customer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customers::findOrFail($id);
        return view('admin.master.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customers::findOrFail($id);
        return view('admin.master.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        //
        $customer = $request->validated();
        Customers::findOrFail($id)->update($customer);
        // Session::flash('success', 'Data Customer Telah Diubah.');
        toastr()->success('Data Customer Telah Diubah.');
        return redirect()->route('admin.master.customer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customers::findOrFail($id)->delete();
        // Session::flash('success', 'Data Customer Telah Dihapus.');
        toastr()->success('Data Customer Telah Di hapus.');
        return redirect()->route('admin.master.customer.index');
    }
}
