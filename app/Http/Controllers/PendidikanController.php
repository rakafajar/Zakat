<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PendidikanModel;
use DB;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikan = PendidikanModel::all();
        return view('pendidikan.index', compact('pendidikan', $pendidikan));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendidikan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendidikan = new PendidikanModel;
        $pendidikan->nama_pendidikan = $request['nama_pendidikan'];
        $pendidikan->save();

        return redirect()->route('pendidikan.index')->with('success', 'Data Berhasil Disimpan!');
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
        $pendidikan = PendidikanModel::find($id);
        return view('pendidikan.edit', compact('pendidikan', $pendidikan));

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
        $pendidikan = PendidikanModel::find($id);
        $pendidikan->nama_pendidikan = $request['nama_pendidikan'];
        $pendidikan->update();

        return redirect()->route('pendidikan.index')->with('info', 'Data Berhasil Disimpan!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_pendidikan')->where('id_pendidikan', '=', $id)->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }
}
