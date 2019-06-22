<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GolonganModel;
use DB;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mustahiq = GolonganModel::all();
        return view('mustahiq.index', compact('mustahiq', $mustahiq));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mustahiq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mustahiq = new GolonganModel;
        $mustahiq->nama_golongan = $request['nama_golongan'];
        $mustahiq->save();


        return redirect(route('golongan.index'))->with('success', 'Data Berhasil Disimpan!');

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
        $mustahiq = GolonganModel::find($id);
        return view('mustahiq.edit', compact($mustahiq, 'mustahiq'));
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
        $mustahiq = GolonganModel::find($id);
        $mustahiq->nama_golongan = $request['nama_golongan'];
        $mustahiq->update();

        return redirect(route('golongan.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_golongan')->where('id_golongan', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
