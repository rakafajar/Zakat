<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KecamatanModel;
use App\KotaKabupatenModel;

class KecamatanController extends Controller
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
        $kecamatan = KecamatanModel::all();
        return view('districts.index', compact('kecamatan', $kecamatan));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lihatkotakab = KotaKabupatenModel::all();
        return view('districts.create', compact('lihatkotakab', $lihatkotakab));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kecamatan = new KecamatanModel;
        $kecamatan ->id = $request['id_districts'];
        $kecamatan ->city_id = $request['city_id'];
        $kecamatan ->name = $request['name_districts'];
        $kecamatan ->save();

        return redirect(route('kecamatan.index'))->with('success','Data Berhasil Disimpan!');

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
        $kecamatan = KecamatanModel::find($id);
        $lihatkotakab = KotaKabupatenModel::all();
        return view('districts.edit', compact('kecamatan', $kecamatan, 'lihatkotakab', $lihatkotakab));
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
        $lihatkotakab = KecamatanModel::find($id);
        $lihatkotakab ->id = $request['id_districts'];
        $lihatkotakab ->city_id = $request['city_id'];
        $lihatkotakab ->name = $request['name_districts'];
        $lihatkotakab ->update();

        return redirect(route('kecamatan.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = KecamatanModel::find($id);
        $kecamatan->delete();

        return back()->with('warning','Data Berhasil Dihapus!');
    }
}
