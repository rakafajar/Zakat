<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WakafModel;
use App\ViewWakafModel;
use App\JenisWakafModel;
use DB;
use PDF;

class WakafController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $view_wakaf = ViewWakafModel::all();
        return view('wakaf.index', compact('view_wakaf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_wakaf = JenisWakafModel::all();
        return view('wakaf.create', compact('jenis_wakaf'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wakaf = new WakafModel;
        $wakaf->nama_wakaf = $request['nama_wakaf'];
        $wakaf->id_jeniswakaf = $request['id_jeniswakaf'];
        $wakaf->nominal_wakaf = $request['nominal_wakaf'];
        $wakaf->save();

        return redirect(route('wakaf.index'))->with('success', 'Data Berhasil Disimpan');
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
        $wakaf = WakafModel::find($id);
        $jenis_wakaf = JenisWakafModel::all();
        return view('wakaf.edit', compact('jenis_wakaf', 'wakaf'));
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
        $wakaf = WakafModel::find($id);
        $wakaf->nama_wakaf = $request['nama_wakaf'];
        $wakaf->id_jeniswakaf = $request['id_jeniswakaf'];
        $wakaf->nominal_wakaf = $request['nominal_wakaf'];
        $wakaf->update();

        return redirect(route('wakaf.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_wakaf')->where('id_wakaf', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function laporanWakaf()
    {
        $wakaf = ViewWakafModel::all();
        $no = 0;
        $pdf = PDF::loadView('wakaf.laporan', compact('wakaf', 'no'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $wakaf = WakafModel::find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('wakaf.invoice', compact('wakaf'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
