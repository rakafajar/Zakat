<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgamaModel;
use DB;

class AgamaController extends Controller
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
        $agama = AgamaModel::all();
        return view('agama.index', compact('agama', $agama));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agama.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agama = new AgamaModel;
        $agama->nama_agama = $request['nama_agama'];
        $agama->save();

        return redirect(route('agama.index'))->with('success','Data Berhasil Disimpan!');
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
        $agama = AgamaModel::find($id);
        return view('agama.edit', compact('agama', $agama));
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
        $agama = AgamaModel::find($id);
        $agama->nama_agama = $request['nama_agama'];
        $agama->update();

        return redirect(route('agama.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_agama')->where('id_agama', '=', $id)->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }
}
