<?php

namespace App\Http\Controllers\Admin\Master;

use App\Models\Armada;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Requests\Admin\Master\Armada\CreateArmadaRequest;
use App\Http\Requests\Admin\Master\Armada\UpdateArmadaRequest;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $armadas = Armada::all();
        return view('admin.master.armada.index',compact('armadas'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.armada.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArmadaRequest $request)
    {
        $armadas = $request->validated();
        Armada::insert($armadas);
        // Session::flash('success', 'Data Armada Telah Ditambah.');
        // Alert::success('Success', 'Data Armada Telah Ditambah.');
        toastr()->success('Data Armada Telah Ditambah.');
        return redirect()->route('admin.master.armada.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $armada = Armada::findOrFail($id);
        return view('admin.master.armada.show',compact('armada'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $armada = Armada::findOrFail($id);
        return view('admin.master.armada.edit',compact('armada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArmadaRequest $request, string $id)
    {
        $armada = $request->validated();
        Armada::findOrFail($id)->update($armada);
        // Session::flash('success', 'Data Armada Telah Diubah.');
        toastr()->success('Data Armada Telah Diubah.');
        return redirect()->route('admin.master.armada.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Armada::findOrFail($id)->delete();
        // Session::flash('success', 'Data Armada Telah Dihapus.');
        toastr()->success('Data telah berhasil di hapus!');
        return redirect()->route('admin.master.armada.index');
    }
}
