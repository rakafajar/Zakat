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

class PengeluaranZakatFitrahIntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $wilayah = $pengeluaran->wilayah = "Internal";
        $pengeluaran->id_golongan = $request['gol_int'];

        //menentukan jumlah mustahiq setiap golongan
        $jml_gol = DB::table('tb_mustahiq')->where('id_golongan', $request['gol_int'])->where('wilayah', 
                    $wilayah)->count();
        $pengeluaran->jml_golongan = $jml_gol;

        $jml_peng_zfitrah = $pengeluaran->jml_peng_zfitrah = $request['hsl_gol_int'];
        $perorang = $jml_peng_zfitrah / $jml_gol;
        $pengeluaran->peng_zfitrah_org = $perorang;

        $pengeluaran->keterangan = $request['keterangan'];
        $pengeluaran->save();

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
