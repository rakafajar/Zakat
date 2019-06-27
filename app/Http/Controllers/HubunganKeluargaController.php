<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HubunganKeluargaModel;
use DB;

class HubunganKeluargaController extends Controller
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
        $hub_keluarga = HubunganKeluargaModel::all();
        return view('hubungankeluarga.index', compact('hub_keluarga', $hub_keluarga));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hubungankeluarga.create');
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
            'hubungan_keluarga' => 'required',
        ]);
        $hub_keluarga = new HubunganKeluargaModel;
        $hub_keluarga->nama_hubkeluarga = $request['hubungan_keluarga'];
        $hub_keluarga->save();

        return redirect(route('hubungankeluarga.index'))->with('success','Data Berhasil Disimpan!');
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
        $hub_keluarga = HubunganKeluargaModel::find($id);
        return view('hubungankeluarga.edit', compact('hub_keluarga', $hub_keluarga));
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
            'hubungan_keluarga' => 'required',
        ]);
        $hub_keluarga = HubunganKeluargaModel::find($id);
        $hub_keluarga->nama_hubkeluarga = $request['hubungan_keluarga'];
        $hub_keluarga->update();
        return redirect(route('hubungankeluarga.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_hubkeluarga')->where('id_hubkeluarga', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }
}
