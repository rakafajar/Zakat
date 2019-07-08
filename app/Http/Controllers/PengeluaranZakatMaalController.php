<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PengeluaranZakatMaalModel;
use DB;

class PengeluaranZakatMaalController extends Controller
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
        $kas = DB::table('tb_kas')->where('id_kas', 4)->first();
        $pengeluaran = PengeluaranZakatMaalModel::all();
        return view('pengeluaran.pengeluaranzakatmaal', compact('kas', 'pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengeluaran = new PengeluaranZakatMaalModel();
        $pengeluaran->jml_peng_zmaal = $request['jml_peng_zmaal'];
        $pengeluaran->keterangan = $request['keterangan'];
        $pengeluaran->save();

        DB::table('tb_kas')->where('id_kas', 4)->update([
            'jml_kas' => $request['jml_kas'] - $request['jml_peng_zmaal']
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
