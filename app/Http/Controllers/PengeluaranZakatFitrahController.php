<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengeluaranZakatFitrahModel;
use App\ViewPengeluaranZakatFitrahModel;
use App\GolonganModel;
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
        $tot_mustahik = DB::table('tb_mustahiq')->count();
        $fakir = DB::table('tb_mustahiq')->where('id_golongan', 1)->count();
        $miskin = DB::table('tb_mustahiq')->where('id_golongan', 2)->count();
        $riqab = DB::table('tb_mustahiq')->where('id_golongan', 3)->count();
        $gharim = DB::table('tb_mustahiq')->where('id_golongan', 4)->count();
        $mualaf = DB::table('tb_mustahiq')->where('id_golongan', 5)->count();
        $fisabiliah = DB::table('tb_mustahiq')->where('id_golongan', 6)->count();
        $ibnusabil = DB::table('tb_mustahiq')->where('id_golongan', 7)->count();
        $amil = DB::table('tb_mustahiq')->where('id_golongan', 8)->count();
        $golongan = GolonganModel::all();
        $pengeluaran = ViewPengeluaranZakatFitrahModel::all();

        return view('pengeluaran.pengeluaranzakatfitrah', compact('kas', 'golongan', 'pengeluaran',
            'tot_mustahik', 'fakir', 'miskin', 'riqab', 'gharim', 'mualaf', 'fisabiliah', 'ibnusabil',
            'amil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $pengeluaran = new PengeluaranZakatFitrahModel();
        $pengeluaran->wilayah = $request['wil'];
        $pengeluaran->id_golongan = $request['gol'];

        //menentukan jumlah mustahiq setiap golongan
        $jml_gol = DB::table('tb_mustahiq')->where('id_golongan', $request['gol'])->count();
        $pengeluaran->jml_golongan = $jml_gol;

        //menentukan total pengeluaran zakat fitrah dan pembagian perorangnya
        $jml_peng_zfitrah = $pengeluaran->jml_peng_zfitrah = $request['jml_peng_zfitrah'];
        $perorang = $jml_peng_zfitrah / $jml_gol;
        $pengeluaran->peng_zfitrah_org = $perorang;

        $pengeluaran->keterangan = $request['keterangan'];
        $pengeluaran->save();

        DB::table('tb_kas')->where('id_kas', 5)->update([
            'jml_kas' => $request['jml_kas'] - $request['jml_peng_zfitrah']
        ]);

        return back()->with('success', 'Pengeluaran Berhasil!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}