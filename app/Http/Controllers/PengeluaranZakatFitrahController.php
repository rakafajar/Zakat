<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengeluaranZakatFitrahModel;
use App\ViewPengeluaranZakatFitrahModel;
use App\GolonganModel;
use App\KasInternalModel;
use App\KasEksternalModel;
use DB;
use PDF;

class PengeluaranZakatFitrahController extends Controller
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
        $kas = DB::table('tb_kas')->where('id_kas', 5)->first();
        $golongan = GolonganModel::all();
        $kas_int = DB::table('tb_kas_internal')->where('id_kas_int', 1)->first();
        $kas_eks = DB::table('tb_kas_eksternal')->where('id_kas_eks', 1)->first();
        $pengeluaran = ViewPengeluaranZakatFitrahModel::all();

        return view('pengeluaran.pengeluaranzakatfitrah', compact('kas', 'golongan', 'pengeluaran', 'kas_int', 'kas_eks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pengeluaran = new PengeluaranZakatFitrahModel();
        // $pengeluaran->wilayah = $request['wil'];
        // $pengeluaran->id_golongan = $request['gol'];

        // //menentukan jumlah mustahiq setiap golongan
        // $jml_gol = DB::table('tb_mustahiq')->where('id_golongan', $request['gol'])->where('wilayah', 
        //             $request['wil'])->count();
        // $pengeluaran->jml_golongan = $jml_gol;

        // //menentukan total pengeluaran zakat fitrah dan pembagian perorangnya
        // $jml_peng_zfitrah = $pengeluaran->jml_peng_zfitrah = $request['jml_peng_zfitrah'];
        // $perorang = $jml_peng_zfitrah / $jml_gol;
        // $pengeluaran->peng_zfitrah_org = $perorang;

        // $pengeluaran->keterangan = $request['keterangan'];
        // $pengeluaran->save();

        // DB::table('tb_kas')->where('id_kas', 5)->update([
        //     'jml_kas' => $request['jml_kas'] - $request['jml_peng_zfitrah']
        // ]);

        $jml_kas = $request['jml_kas'];
        $jml_kas_int = $request['jml_kas_int'];
        $jml_kas_eks = $request['jml_kas_eks'];
        $hsl_persen_int = $request['hsl_persen_int'];
        $hsl_persen_eks = $request['hsl_persen_eks'];
        $tot_pembagian = $hsl_persen_int + $hsl_persen_eks;

        DB::table('tb_kas')->where('id_kas', 5)->update([
            'jml_kas' => $jml_kas - $tot_pembagian
        ]);

        DB::table('tb_kas_internal')->where('id_kas_int', 1)->update([
            'jml_kas_int' => $jml_kas_int + $hsl_persen_int
        ]);

        DB::table('tb_kas_internal')->where('id_kas_int', 2)->update([
            'jml_kas_int' => $jml_kas_int + $hsl_persen_int
        ]);

        DB::table('tb_kas_eksternal')->where('id_kas_eks', 1)->update([
            'jml_kas_eks' => $jml_kas_eks + $hsl_persen_eks
        ]);

        DB::table('tb_kas_eksternal')->where('id_kas_eks', 2)->update([
            'jml_kas_eks' => $jml_kas_eks + $hsl_persen_eks
        ]);

        return back()->with('success', 'Pembagian Wilayah Berhasil!');
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
        $pengeluaran = PengeluaranZakatFitrahModel::find($id);
        return view('pengeluaran.editzfitrah', compact('pengeluaran'));
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
        $pengeluaran = PengeluaranZakatFitrahModel::find($id);
        $pengeluaran->created_at = $request['tgl_pengeluaran'];
        $pengeluaran->update();

        return redirect(route('pengeluaranzakatfitrah.index'))->with('info', 'Tanggal Pembayaran Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_pengeluaran_zakat_fitrah')->where('id_peng_zfitrah', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
    public function buktiBayar($id)
    {
        //GET DATA BERDASARKAN ID
        $pengeluaran = PengeluaranZakatFitrahModel::find($id);
        //LOAD PDF YANG MERUJUK KE VIEW PRINT.BLADE.PHP DENGAN MENGIRIMKAN DATA DARI INVOICE
        //KEMUDIAN MENGGUNAKAN PENGATURAN LANDSCAPE A4
        $pdf = PDF::loadView('pengeluaran.invoicezakatfitrah', compact('pengeluaran'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
        //Delete All dengan CheckBox
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $pengeluaran = PengeluaranZakatFitrahModel::find($id);
            $pengeluaran->delete();
        }
    }
}