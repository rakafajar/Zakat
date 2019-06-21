<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JenisPekerjaanModel;

class JenisPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_pekerjaan = JenisPekerjaanModel::all();
        return view('pekerjaan.index', compact('jenis_pekerjaan', $jenis_pekerjaan));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pekerjaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jenis_pekerjaan = new JenisPekerjaanModel;
        $jenis_pekerjaan->nama_pekerjaan = $request['nama_pekerjaan'];
        $jenis_pekerjaan->save();

        return redirect(route('jenispekerjaan.index'))->with('success','Data Berhasil Disimpan!'); 
        
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
        $jenis_pekerjaan = JenisPekerjaanModel::find($id);
        return view('pekerjaan.edit', compact('jenis_pekerjaan', $jenis_pekerjaan));
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
        $jenis_pekerjaan = JenisPekerjaanModel::find($id);
        $jenis_pekerjaan->nama_pekerjaan = $request['nama_pekerjaan'];
        $jenis_pekerjaan->update();

        return redirect(route('jenispekerjaan.index'))->with('info','Data Berhasil Diubah!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_pekerjaan = JenisPekerjaanModel::find($id);
        $jenis_pekerjaan->delete();

        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
