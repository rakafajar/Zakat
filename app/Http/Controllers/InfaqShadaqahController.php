<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfaqShadaqahModel;
use App\ViewTotalKasInshaModel;
use App\ViewMuzakkiModel;
use DB;
use PDF;

class InfaqShadaqahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $insha = InfaqShadaqahModel::all();
        $view_tot_insha = ViewTotalKasInshaModel::all();
        return view('infaqshodaqoh.index', compact('insha', 'view_tot_insha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $view_muzakki = ViewMuzakkiModel::all();
        return view('infaqshodaqoh.create', compact('view_muzakki'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_insha' => 'required',
            'nominal_insha' => 'required|numeric',
        ]);
        $insha = new InfaqShadaqahModel;
        $insha->nama_insha = $request['nama_insha'];
        $insha->nominal_insha = $request['nominal_insha'];
        $insha->save();

        return redirect(route('infaqshadaqah.index'))->with('success', 'Data Berhasil Disimpan!');
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
        $view_muzakki = ViewMuzakkiModel::all();
        $insha = InfaqShadaqahModel::find($id);
        return view('infaqshodaqoh.edit', compact('insha', $insha, 'view_muzakki'));
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
        $this->validate($request, [
            'nama_insha' => 'required',
            'nominal_insha' => 'required|numeric',
        ]);
        $insha = InfaqShadaqahModel::find($id);
        $insha->nama_insha = $request['nama_insha'];
        $insha->nominal_insha = $request['nominal_insha'];
        $insha->update();

        return redirect(route('infaqshadaqah.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_insha')->where('id_insha', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }

    public function laporanInsa()
    {
        $insha = InfaqShadaqahModel::all();
        $view_tot_insha = ViewTotalKasInshaModel::all();
        $no = 0;
        $pdf = PDF::loadView('infaqshodaqoh.laporan', compact('insha', 'no', 'view_tot_insha'));
        $pdf->setPaper('a4','potrait');

        return $pdf->stream();
    }
    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $insha = InfaqShadaqahModel::find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('infaqshodaqoh.invoice', compact('insha'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
