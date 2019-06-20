<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProvincesModel;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = ProvincesModel::all();
        return view('provinces.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provinces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $provinsi = new ProvincesModel;
        $provinsi ->id = $request['id_provinsi'];
        $provinsi ->name = $request['name_provinsi'];
        $provinsi->save();

        return redirect(route('provinsi.index'))->with('success','Data Berhasil Disimpan!');
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
        $provinsi = ProvincesModel::find($id);
        return view('provinces.edit', compact('provinsi', $provinsi));
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
        $provinsi = ProvincesModel::find($id);
        $provinsi ->name = $request['name_provinsi'];
        $provinsi->update();

        return redirect(route('provinsi.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = ProvincesModel::find($id);
        $provinsi->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }
}
