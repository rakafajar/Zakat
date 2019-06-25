<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnggotaKKModel;
use App\KartuKeluargaModel;
use App\AgamaModel;
use App\JenisPekerjaanModel;
use App\HubunganKeluargaModel;
use App\PendidikanModel;
use App\StatusPerkawinanModel;
use App\ViewAnggotakkModel;
use DB;

class AnggotaKeluargaController extends Controller
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
        $anggotakeluarga = ViewAnggotakkModel::all();
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
        $agama = AgamaModel::all();
        $pendidikan = PendidikanModel::all();
        $hubkeluarga = HubunganKeluargaModel::all();
        $status = StatusPerkawinanModel::all();
        $pekerjaan = JenisPekerjaanModel::all();
        return view ('anggotakeluarga.create', compact('kartukeluarga', 'agama', 'pendidikan', 'hubkeluarga', 'status', 'pekerjaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_agama' => 'required',
            'id_pendidikan' => 'required',
            'id_pekerjaan' => 'required',
            'id_status_kawin' => 'required',
            'id_pekerjaan' => 'required',
            'id_status_hubkel' => 'required',
            'kewarganegaraan' => 'required',
            'id_kk' => 'required',
            'jk' => 'required'
        ]);

        $anggotakeluarga = new AnggotaKKModel;
        $anggotakeluarga -> nama_lengkap = $request['nama_lengkap'];
        $anggotakeluarga -> nik = $request['nik'];
        $anggotakeluarga -> id_kk = $request['id_kk'];
        $anggotakeluarga -> jk = $request['jk'];
        $anggotakeluarga -> tmp_lahir = $request['tmp_lahir'];
        $anggotakeluarga -> tgl_lahir = $request['tgl_lahir'];
        $anggotakeluarga -> id_agama = $request['id_agama'];
        $anggotakeluarga -> id_pendidikan = $request['id_pendidikan'];
        $anggotakeluarga -> id_pekerjaan = $request['id_pekerjaan'];
        $anggotakeluarga -> id_status_kawin = $request['id_status_kawin'];
        $anggotakeluarga -> id_status_hubkel = $request['id_status_hubkel'];
        $anggotakeluarga -> kewarganegaraan = $request['kewarganegaraan'];
        $anggotakeluarga -> no_paspor = $request['no_paspor'];
        $anggotakeluarga -> no_kitap = $request['no_kitap'];
        $anggotakeluarga -> ayah = $request['ayah'];
        $anggotakeluarga -> ibu = $request['ibu'];
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
        $agama = AgamaModel::all();
        $pendidikan = PendidikanModel::all();
        $hubkeluarga = HubunganKeluargaModel::all();
        $status = StatusPerkawinanModel::all();
        $pekerjaan = JenisPekerjaanModel::all();
        $anggotakeluarga = AnggotaKKModel::find($id);
        return view ('anggotakeluarga.edit', compact('kartukeluarga', 'agama', 'pendidikan', 'hubkeluarga', 'status', 'pekerjaan', 'anggotakeluarga'));
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
        $this->validate($request,[
            'id_agama' => 'required',
            'id_pendidikan' => 'required',
            'id_pekerjaan' => 'required',
            'id_status_kawin' => 'required',
            'id_pekerjaan' => 'required',
            'id_status_hubkel' => 'required',
            'kewarganegaraan' => 'required',
            'id_kk' => 'required',
            'jk' => 'required'
        ]);
        $anggotakeluarga = AnggotaKKModel::find($id);
        $anggotakeluarga -> nama_lengkap = $request['nama_lengkap'];
        $anggotakeluarga -> nik = $request['nik'];
        $anggotakeluarga -> id_kk = $request['id_kk'];
        $anggotakeluarga -> jk = $request['jk'];
        $anggotakeluarga -> tmp_lahir = $request['tmp_lahir'];
        $anggotakeluarga -> tgl_lahir = $request['tgl_lahir'];
        $anggotakeluarga -> id_agama = $request['id_agama'];
        $anggotakeluarga -> id_pendidikan = $request['id_pendidikan'];
        $anggotakeluarga -> id_pekerjaan = $request['id_pekerjaan'];
        $anggotakeluarga -> id_status_kawin = $request['id_status_kawin'];
        $anggotakeluarga -> id_status_hubkel = $request['id_status_hubkel'];
        $anggotakeluarga -> kewarganegaraan = $request['kewarganegaraan'];
        $anggotakeluarga -> no_paspor = $request['no_paspor'];
        $anggotakeluarga -> no_kitap = $request['no_kitap'];
        $anggotakeluarga -> ayah = $request['ayah'];
        $anggotakeluarga -> ibu = $request['ibu'];
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
        DB::table('tb_anggotakk')->where('id_anggotakk', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
