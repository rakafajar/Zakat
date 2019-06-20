<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KartuKeluargaModel;
use App\ProvinsiModel;
use App\KotaKabupatenModel;
use App\KecamatanModel;
use App\DesaModel;


class KartuKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kartukeluarga = KartuKeluargaModel::all();
        return view ('kartukeluarga.index', compact('kartukeluarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kartukeluarga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kartukeluarga = new KartuKeluargaModel;
        $kartukeluarga ->no_kk = $request['no_kk'];
        $kartukeluarga ->alamat = $request['alamat'];
        $kartukeluarga ->rt = $request['rt'];
        $kartukeluarga ->rw = $request['rw'];
        $kartukeluarga ->kode_pos = $request['kode_pos'];
        $kartukeluarga ->provinces_id = $request['provinces_id'];
        $kartukeluarga ->cities_id = $request['cities_id'];
        $kartukeluarga ->districts_id = $request['districts_id'];
        $kartukeluarga ->villages_id = $request['villages_id'];
        $kartukeluarga->save();

        return redirect(route('kartukeluarga.index'))->with('success','Data Berhasil Disimpan!');
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
        $kartukeluarga = KartuKeluargaModel::find($id);
        return view('kartukeluarga.edit', compact('kartukeluarga', $kartukeluarga));
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
        $kartukeluarga = KartuKeluargaModel::find($id);
        $kartukeluarga ->no_kk = $request['no_kk'];
        $kartukeluarga ->alamat = $request['alamat'];
        $kartukeluarga ->rt = $request['rt'];
        $kartukeluarga ->rw = $request['rw'];
        $kartukeluarga ->kode_pos = $request['kode_pos'];
        $kartukeluarga ->provinces_id = $request['provinces_id'];
        $kartukeluarga ->cities_id = $request['cities_id'];
        $kartukeluarga ->districts_id = $request['districts_id'];
        $kartukeluarga ->villages_id= $request['villages_id']; 
        $kartukeluarga->update();

        return redirect(route('kartukeluarga.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kartukeluarga = KartuKeluargaModel::find($id);
        $kartukeluarga->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    } 
}
