<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnggotaKeluargaModel;
use App\KartuKeluargaModel;
use App\ViewKartuKeluargaModel;

class AnggotaKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggotakeluarga = ViewKartuKeluargaModel::all();
        return view('anggotakeluarga.index', compact('anggotakeluarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kartukeluarga = KartuKeluargaModel::all();
        return view ('anggotakeluarga.create', compact('kartukeluarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anggotakeluarga = new AnggotaKeluargaModel;
        $anggotakeluarga ->kk_id = $request['kk_id'];
        $anggotakeluarga ->nama = $request['nama'];
        $anggotakeluarga ->nik = $request['nik'];
        $anggotakeluarga ->jenis_kelamin = $request['jenis_kelamin'];
        $anggotakeluarga ->tempat_lahir = $request['tempat_lahir'];
        $anggotakeluarga ->tanggal_lahir = $request['tanggal_lahir'];
        $anggotakeluarga ->agama = $request['agama'];
        $anggotakeluarga ->pendidikan = $request['pendidikan'];
        $anggotakeluarga ->pekerjaan = $request['pekerjaan'];
        $anggotakeluarga ->status_kawin = $request['status_kawin'];
        $anggotakeluarga ->hubungan_keluarga = $request['hubungan_keluarga'];
        $anggotakeluarga ->kewarga = $request['kewarga'];
        $anggotakeluarga ->no_paspor = $request['no_paspor'];
        $anggotakeluarga ->no_kitap = $request['no_kitap'];
        $anggotakeluarga ->nama_ayah = $request['nama_ayah'];
        $anggotakeluarga ->nama_ibu = $request['nama_ibu'];
        $anggotakeluarga->save();

        return redirect(route('anggotakeluarga.index'))->with('success','Data Berhasil Disimpan!');
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
        $kartukeluarga = KartuKeluargaModel::all();
        $anggotakeluarga = AnggotaKeluargaModel::find($id);
        return view('anggotakeluarga.edit', compact('anggotakeluarga', 'kartukeluarga'));
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
        $anggotakeluarga = AnggotaKeluargaModel::find($id);
        $anggotakeluarga ->kk_id = $request['kk'];
        $anggotakeluarga ->nama = $request['nama'];
        $anggotakeluarga ->nik = $request['nik'];
        $anggotakeluarga ->jenis_kelamin = $request['jenis_kelamin'];
        $anggotakeluarga ->tempat_lahir = $request['tempat_lahir'];
        $anggotakeluarga ->tanggal_lahir = $request['tanggal_lahir'];
        $anggotakeluarga ->agama = $request['agama'];
        $anggotakeluarga ->pendidikan = $request['pendidikan'];
        $anggotakeluarga ->pekerjaan = $request['pekerjaan'];
        $anggotakeluarga ->status_kawin = $request['status_kawin'];
        $anggotakeluarga ->hubungan_keluarga = $request['hubungan_keluarga'];
        $anggotakeluarga ->kewarga = $request['kewarga'];
        $anggotakeluarga ->no_paspor = $request['no_paspor'];
        $anggotakeluarga ->no_kitap = $request['no_kitap'];
        $anggotakeluarga ->nama_ayah = $request['nama_ayah'];
        $anggotakeluarga ->nama_ibu = $request['nama_ibu'];
        $anggotakeluarga->update();

        return redirect(route('anggotakeluarga.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggotakeluarga = AnggotaKeluargaModel::find($id);
        $anggotakeluarga->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }
}
