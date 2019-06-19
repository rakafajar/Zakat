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
        $provinsi = ProvinsiModel::all();
        $kotakabupaten = KotaKabupatenModel::all();
        $kecamatan = KecamatanModel::all();
        $desa = DesaModel::all();
        return view('kartukeluarga.create', compact( 'provinsi', 'kotakabupaten', 'kecamatan', 'desa'));
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
        $kartukeluarga ->nama = $request['nama'];
        $kartukeluarga ->alamat = $request['alamat'];
        $kartukeluarga ->rt = $request['rt'];
        $kartukeluarga ->rw = $request['rw'];
        $kartukeluarga ->kode_pos = $request['kode_pos'];
        $kartukeluarga ->id_provinces = $request['id_provinces'];
        $kartukeluarga ->id_cities = $request['id_cities'];
        $kartukeluarga ->id_districts = $request['id_districts'];
        $kartukeluarga ->id_villages = $request['id_villages'];
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
        $kartukeluarga ->nama = $request['nama'];
        $kartukeluarga ->alamat = $request['alamat'];
        $kartukeluarga ->rt = $request['rt'];
        $kartukeluarga ->rw = $request['rw'];
        $kartukeluarga ->kode_pos = $request['kode_pos'];
        $kartukeluarga ->id_provinces = $request['id_provinces'];
        $kartukeluarga ->id_cities = $request['id_cities'];
        $kartukeluarga ->id_districts = $request['id_districts'];
        $kartukeluarga ->id_villages = $request['id_villages']; 
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
