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
        return view('anggotakeluarga.create', compact('kartukeluarga', 'agama', 'pendidikan', 'hubkeluarga', 'status', 'pekerjaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'nik' => 'required|numeric|unique:tb_anggotakk',
            'nomor_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_kawin' => 'required',
            'kewarganegaraan' => 'required',
            'hubungan_keluarga' => 'required',
            'no_paspor' => 'required|numeric',
            'no_kitap' => 'required|numeric',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);

        $anggotakeluarga = new AnggotaKKModel;
        $anggotakeluarga->nama_lengkap = $request['nama_lengkap'];
        $anggotakeluarga->nik = $request['nik'];
        $anggotakeluarga->id_kk = $request['nomor_kk'];
        $anggotakeluarga->jk = $request['jenis_kelamin'];
        $anggotakeluarga->tmp_lahir = $request['tempat_lahir'];
        $anggotakeluarga->tgl_lahir = $request['tanggal_lahir'];
        $anggotakeluarga->id_agama = $request['nama_agama'];
        $anggotakeluarga->id_pendidikan = $request['pendidikan'];
        $anggotakeluarga->id_pekerjaan = $request['pekerjaan'];
        $anggotakeluarga->id_status_kawin = $request['status_kawin'];
        $anggotakeluarga->id_status_hubkel = $request['hubungan_keluarga'];
        $anggotakeluarga->kewarganegaraan = $request['kewarganegaraan'];
        $anggotakeluarga->no_paspor = $request['no_paspor'];
        $anggotakeluarga->no_kitap = $request['no_kitap'];
        $anggotakeluarga->ayah = $request['ayah'];
        $anggotakeluarga->ibu = $request['ibu'];
        $anggotakeluarga->save();

        return redirect(route('anggotakeluarga.index'))->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggotakeluarga = AnggotaKKModel::leftJoin('tb_kartukeluarga', 'tb_kartukeluarga.id_kk', '=', 'tb_anggotakk.id_kk')
            ->orderBy('tb_anggotakk.id_kk')->find($id);
        return view('anggotakeluarga.show', compact($anggotakeluarga, 'anggotakeluarga'));
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
        return view('anggotakeluarga.edit', compact('kartukeluarga', 'agama', 'pendidikan', 'hubkeluarga', 'status', 'pekerjaan', 'anggotakeluarga'));
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
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'nomor_nik' => 'required|numeric',
            'nomor_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'status_kawin' => 'required',
            'kewarganegaraan' => 'required',
            'hubungan_keluarga' => 'required',
            'no_paspor' => 'required|numeric',
            'no_kitap' => 'required|numeric',
            'ayah' => 'required',
            'ibu' => 'required',
        ]);
        $anggotakeluarga = AnggotaKKModel::find($id);
        $anggotakeluarga->nama_lengkap = $request['nama_lengkap'];
        $anggotakeluarga->nik = $request['nomor_nik'];
        $anggotakeluarga->id_kk = $request['nomor_kk'];
        $anggotakeluarga->jk = $request['jenis_kelamin'];
        $anggotakeluarga->tmp_lahir = $request['tempat_lahir'];
        $anggotakeluarga->tgl_lahir = $request['tanggal_lahir'];
        $anggotakeluarga->id_agama = $request['nama_agama'];
        $anggotakeluarga->id_pendidikan = $request['pendidikan'];
        $anggotakeluarga->id_pekerjaan = $request['pekerjaan'];
        $anggotakeluarga->id_status_kawin = $request['status_kawin'];
        $anggotakeluarga->id_status_hubkel = $request['hubungan_keluarga'];
        $anggotakeluarga->kewarganegaraan = $request['kewarganegaraan'];
        $anggotakeluarga->no_paspor = $request['no_paspor'];
        $anggotakeluarga->no_kitap = $request['no_kitap'];
        $anggotakeluarga->ayah = $request['ayah'];
        $anggotakeluarga->ibu = $request['ibu'];
        $anggotakeluarga->update();

        return redirect(route('anggotakeluarga.index'))->with('info', 'Data Berhasil Diubah!');
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
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $anggotakeluarga = AnggotaKKModel::find($id);
            $anggotakeluarga->delete();
        }
    }
}
