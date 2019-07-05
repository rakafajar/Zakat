<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KasInshaModel;
use App\PengeluaranInshaModel;
use DB;

class PengeluaranInshaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$kasinsha = KasInshaModel::all();
    	$pengeluaran = PengeluaranInshaModel::all();
        return view('pengeluaran.pengeluaraninsha', compact('kasinsha', 'pengeluaran'));
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
        $pengeluaran = new PengeluaranInshaModel();
        $pengeluaran->jml_peng_insha = $request['jml_peng_insha'];
        $pengeluaran->save();

        DB::table('tb_kas_insha')->where('id_kas_insha', '=', '1')->update([
            'jml_kas_insha' => $request['jml_kas_insha'] - $request['jml_peng_insha']
        ]);

        return back()->with('success','Pengeluaran Berhasil!');
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
        DB::table('tb_pengeluaran_insha')->where('id_peng_insha', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
