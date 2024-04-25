<?php

namespace App\Http\Controllers\Admin\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transaksi\MuatBongkar\CreateMuatBongkarRequest;
use App\Http\Requests\Admin\Transaksi\MuatBongkar\UpdateMuatBongkarRequest;
use App\Models\Armada;
use App\Models\BongkarDetail;
use App\Models\KontrakBeli;
use App\Models\KontrakJual;
use App\Models\MuatBongkar;
use App\Models\MuatDetail;
use App\Models\Supir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $armadas = Armada::all();
        $supirs = Supir::all();
        $kontrakbelis = KontrakBeli::all();
        $kontrakjuals = KontrakJual::all();
        return view('admin.transaksi.muatbongkar.create', compact('armadas', 'supirs', 'kontrakbelis', 'kontrakjuals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateMuatBongkarRequest $request)
    {
        //


        DB::transaction(function () use ($request) {
            $muatbongkar = $request->validated();
            $header = MuatBongkar::create([
                'no' => $muatbongkar['no'],
                'supir_id' => $muatbongkar['supir_id'],
                'armada_id' => $muatbongkar['armada_id'],
                'muat' => $muatbongkar['muat'],
                'bongkar' => $muatbongkar['bongkar'],
                'susut' => $muatbongkar['susut'],
                'potsusut' => $muatbongkar['potsusut'],
                'ongkos' => $muatbongkar['ongkos'],
                'pphpercentage' => $muatbongkar['pph'],
            ]);

            $tableData1 = json_decode($muatbongkar['tableData1']);
            foreach ($tableData1 as $item) {
                $kontrakbeli = KontrakBeli::where('no', $item->No)->first();
                MuatDetail::create([
                    'muat_bongkar_id' => $header->id,
                    'kontrak_beli_id' => $kontrakbeli->id,
                    'tanggal' => $item->Tanggal,
                    'bruto' => $item->Bruto,
                    'tarra' => $item->Tarra,
                    'netto' => $item->Netto,
                ]);
            }
            $tableData2 = json_decode($muatbongkar['tableData2']);
            foreach ($tableData2 as $item) {
                $kontrakjual = KontrakJual::where('no', $item->No)->first();
                BongkarDetail::create([
                    'muat_bongkar_id' => $header->id,
                    'kontrak_jual_id' => $kontrakjual->id,
                    'tanggal' => $item->Tanggal,
                    'bruto' => $item->Bruto,
                    'tarra' => $item->Tarra,
                    'netto' => $item->Netto,
                ]);
            }
        });

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
    public function update(UpdateMuatBongkarRequest $request, string $id)
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


        MuatDetail::where('muat_bongkar_id', $id)->delete();
        BongkarDetail::where('muat_bongkar_id', $id)->delete();
        MuatBongkar::where('id', $id)->delete();

        // Session::flash('success', 'Data Kontrak Jual Telah Dihapus.');
        toastr()->success('Data Muat Bongkar Telah Dihapus.');
        return redirect()->route('admin.transaksi.muatbongkar.index');
    }
}
