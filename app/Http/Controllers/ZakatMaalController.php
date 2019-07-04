<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZakatMaalModel;
use App\ViewMuzakkiModel;
use App\ViewZakatMaalModel;
use App\ViewTotalKasZakatMaalModel;
use PDF;

class ZakatMaalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $view_zakat_maal = ViewZakatMaalModel::all();
        $view_tot_kas_zakat_maal = ViewTotalKasZakatMaalModel::all();
        return view('zakatmaal.index', compact('view_zakat_maal', 'view_tot_kas_zakat_maal'));
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

        return view('zakatmaal.update',compact('zakatmaal'), ['jml' => $jml, 'harga_emas' => $harga_emas, 'nisab' => $nisab]);
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
    public function laporanzakatMaal()
    {
        $view_zakat_maal = ViewZakatMaalModel::all();
        $view_tot_kas_zakat_maal = ViewTotalKasZakatMaalModel::all();
        $no = 0;
        $pdf = PDF::loadView('zakatmaal.laporan', compact('view_zakat_maal', 'no', 'view_tot_kas_zakat_maal'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $zakatmaal = ZakatMaalModel::leftJoin('view_muzakki', 'view_muzakki.id_muzakki', '=', 'tb_zakat_maal.id_muzakki')
            ->orderBy('tb_zakat_maal.id_muzakki')->find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('zakatmaal.invoice', compact('zakatmaal'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
