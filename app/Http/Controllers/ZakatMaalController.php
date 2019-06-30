<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZakatMaalModel;
use App\ViewMuzakkiModel;
use App\ViewZakatMaalModel;

class ZakatMaalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $view_zakat_maal = ViewZakatMaalModel::all();
        return view('zakatmaal.index', compact('view_zakat_maal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_muzakki = ViewMuzakkiModel::all();

        return view('zakatmaal.create', compact('view_muzakki'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zakatmaal = new ZakatMaalModel();
        $muzakki = $zakatmaal->id_muzakki = $request['id_muzakki'];
        $jml = $zakatmaal->jml = $request['jml'];
        $harga_emas = $zakatmaal->harga_emas = $request['harga_emas'];
        $nisab = $zakatmaal->nisab = $request['nisab'];
        $zakatmaal->save();

        return view('zakatmaal.update', ['jml' => $jml, 'harga_emas' => $harga_emas, 'nisab' => $nisab]);
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
        $zakatmaal = ZakatMaalModel::find($id);
        $view_muzakki = ViewMuzakkiModel::all();

        return view('zakatmaal.edit', compact('zakatmaal', 'view_muzakki'));
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
        $zakatmaal = ZakatMaalModel::find($id);
        $muzakki = $zakatmaal->id_muzakki = $request['id_muzakki'];
        $jml = $zakatmaal->jml = $request['jml'];
        $harga_emas = $zakatmaal->harga_emas = $request['harga_emas'];
        $nisab = $zakatmaal->nisab = $request['nisab'];
        $zakatmaal->update();

        return redirect(route('zakatmaal.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zakatmaal = ZakatMaalModel::find($id);
        $zakatmaal->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
