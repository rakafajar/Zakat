<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\MuzzakiModel;
use App\ZakatFitrahModel;

class MuzzakiController extends Controller
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
        $muzzaki = DB::table('tb_muzzaki')
            ->join('tb_kartukeluarga', 'tb_kartukeluarga.id_kk', '=', 'tb_muzzaki.kk_id')
            ->join('tb_anggotakk', 'tb_anggotakk.id_anggotakk', '=', 'tb_muzzaki.anggotakk_id')->get();
        return view('muzzaki.index', compact('muzzaki'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('muzzaki.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $muzzaki = new MuzzakiModel;
        $muzzaki ->kk_id = $request['kartukeluarga'];
        $muzzaki ->anggotakk_id = $request['nik'];
        $muzzaki->save();

        return redirect(route('muzzaki.index'))->with('success', 'Data Berhasil Disimpan!');
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
        $muzzaki = MuzzakiModel::find($id);
        return view('muzzaki.edit', compact('muzzaki', $muzzaki));
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
        $muzzaki = MuzzakiModel::find($id);
        $muzzaki ->kk_id = $request['kartukeluarga'];
        $muzzaki ->anggotakk_id = $request['nik'];
        $muzzaki->update();

        return redirect(route('muzzaki.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $muzzaki = MuzzakiModel::find($id);
        $muzzaki->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
