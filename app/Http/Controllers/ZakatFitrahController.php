<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZakatFitrahModel;
use App\HargaModel;
use App\AnggotaKKModel;
use App\KartuKeluargaModel;
use App\ViewZakatFitrahModel;
use App\ViewMuzakkiModel;
use App\ViewTotalKasZakatFitrahModel;
use PDF;
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
        $kas = DB::table('tb_kas')->where('id_kas', 5)->first();
        return view('zakatfitrah.index', compact('zakatfitrah', 'kas'));
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
        $kas = DB::table('tb_kas')->where('id_kas', 5)->first();

        return view('zakatfitrah.create', compact('harga_beras', 'muzakki', 'kas'));
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
            'id_muzakki' => 'required',
            'harga_beras' => 'required|numeric',
        ]);
        $zakatfitrah = new ZakatFitrahModel();
        $muzakki = $zakatfitrah->id_muzakki = $request['id_muzakki'];
        $harga_beras = $zakatfitrah->harga_beras = $request['harga_beras'];
        $zakatfitrah->created_at = $request['tgl_pembayaran'];
        $nominal = $zakatfitrah->nominal = 2.5 * $harga_beras;
        $zakatfitrah->save();

        DB::table('tb_kas')->where('id_kas', '=', '5')->update([
            'jml_kas' => $request['jml_kas'] + $nominal
        ]);

        return view(
            'zakatfitrah.update',
            compact('zakatfitrah'),
            ['harga_beras' => $harga_beras, 'nominal' => $nominal],
            ['muzakki' => $muzakki]
        );
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
        // $muzakki = ViewMuzakkiModel::all();
        // $harga_beras = HargaModel::all();
        // Menampilkan Nama Lengkap dengan melakukan Join Terhadap id_muzakki  pada view_muzakki
        //  dengan id_muzakki pada tb_zakat_fitrah
        $muzakki = ZakatFitrahModel::leftJoin('view_muzakki', 'view_muzakki.id_muzakki', '=', 'tb_zakat_fitrah.id_muzakki')
            ->orderBy('tb_zakat_fitrah.id_muzakki')->find($id);
        return view('zakatfitrah.edit', compact('zakatfitrah', $zakatfitrah, 'muzakki', $muzakki));
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
            'tgl_pembayaran' => 'required',
            // 'harga_beras' => 'required|numeric',
        ]);
        $zakatfitrah = ZakatFitrahModel::find($id);
        $zakatfitrah->created_at = $request['tgl_pembayaran'];
        $zakatfitrah->update();

        return redirect(route('zakatfitrah.index'))->with('info', 'Tanggal Pembayaran Berhasil Diubah!');
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

    public function laporanzakatFitrah()
    {
        $zakatfitrah = ViewZakatFitrahModel::all();
        $view_tot_zakat_fitrah = ViewTotalKasZakatFitrahModel::all();
        $no = 0;
        $pdf = PDF::loadView('zakatfitrah.laporan', compact('zakatfitrah', 'no', 'view_tot_zakat_fitrah'));
        $pdf->setPaper('a4', 'potrait');

        return $pdf->stream();
    }

    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $zakatfitrah = ZakatFitrahModel::leftJoin('view_muzakki', 'view_muzakki.id_muzakki', '=', 'tb_zakat_fitrah.id_muzakki')
            ->orderBy('tb_zakat_fitrah.id_muzakki')->find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('zakatfitrah.invoice', compact('zakatfitrah'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    //Delete All dengan CheckBox
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $zakatfitrah = ZakatFitrahModel::find($id);
            $zakatfitrah->delete();
        }
    }
}
