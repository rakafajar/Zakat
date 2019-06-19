<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZakatFitrahModel;

class ZakatFitrahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zakatfitrah = ZakatFitrahModel::all();
        return view('zakatfitrah/index', compact('zakatfitrah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zakatfitrah/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zakatfitrah = new ZakatFitrahModel;
        $zakatfitrah ->muzakki_id = $request['muzakki'];
        $zakatfitrah ->hargaberas = $request['hargaberas'];
        $zakatfitrah ->nominal = $request['nominal'];
        $zakatfitrah->save();

        return redirect(route('zakatfitrah.index'))->with('success', 'Data Berhasil Disimpan!');
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
