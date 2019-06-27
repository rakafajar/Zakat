<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZakatFitrahModel;
use App\HargaModel;
use App\ViewZakatFitrahModel;
use App\ViewMuzakkiModel;
use DB;

class ZakatFitrahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zakatfitrah = ViewZakatFitrahModel::all();
        return view('zakatfitrah.index', compact('zakatfitrah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $muzakki = ViewMuzakkiModel::all();
        $harga_beras = HargaModel::all();

        return view('zakatfitrah.create', compact('harga_beras', 'muzakki'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zakatfitrah = new ZakatFitrahModel();
        $muzakki = $zakatfitrah->id_muzakki = $request['id_muzakki'];
        $harga_beras = $zakatfitrah->harga_beras = $request['harga_beras'];
        $nominal = $zakatfitrah->nominal = 2.5 * $harga_beras;
        $zakatfitrah->save();

        return view('zakatfitrah.update', ['harga_beras' => $harga_beras, 'nominal' => $nominal],
            ['muzakki' => $muzakki]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zakatfitrah = ZakatFitrahModel::find($id);
        return view('zakatfitrah.edit', compact('zakatfitrah', $zakatfitrah));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $zakatfitrah = ZakatFitrahModel::find($id);
        $zakatfitrah ->muzakki_id = $request['muzakki'];
        $zakatfitrah ->hargaberas = $request['hargaberas'];
        $zakatfitrah ->nominal = $request['nominal'];
        $zakatfitrah->update();

        return redirect(route('zakatfitrah.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zakatfitrah = ZakatFitrahModel::find($id);
        $zakatfitrah->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
