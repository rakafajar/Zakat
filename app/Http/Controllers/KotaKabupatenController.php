<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KotaKabupatenModel;
use App\ProvincesModel;

class KotaKabupatenController extends Controller
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
        $kotakabupaten = KotaKabupatenModel::all();
        return view('cities.index', compact('kotakabupaten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lihatprovinsi = ProvincesModel::all();
        return view('cities.create', compact('lihatprovinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kotakabupaten = new KotaKabupatenModel;
        $kotakabupaten ->id = $request['id_kota'];
        $kotakabupaten ->province_id = $request['province_id'];
        $kotakabupaten ->name = $request['name_kotakabupaten'];
        $kotakabupaten->save();

        return redirect(route('kotakabupaten.index'))->with('success','Data Berhasil Disimpan!');
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
        $lihatprovinsi = ProvincesModel::all();
        $kotakabupaten = KotaKabupatenModel::find($id);
        return view('cities.edit', compact('kotakabupaten', $kotakabupaten, 'lihatprovinsi', $lihatprovinsi));    
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
        $kotakabupaten = KotaKabupatenModel::find($id);
        $kotakabupaten ->name = $request['name_kotakabupaten'];
        $kotakabupaten->update();

        return redirect(route('kotakabupaten.index'))->with('info','Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kotakabupaten = KotaKabupatenModel::find($id);
        $kotakabupaten->delete();
        return back()->with('warning','Data Berhasil Dihapus!');
    }
}
