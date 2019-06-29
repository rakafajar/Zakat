<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZakatMaalModel;
use App\ViewMuzakkiModel;
use DB;

class ZakatMaalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('zakatmaal.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$view_muzakki = ViewMuzakkiModel::all();

        return view('zakatmaal.create', compact('view_muzakki'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $zakatmaal = new ZakatMaalModel();
        // $muzakki = $zakatmaal->id_muzakki = $request['id_muzakki'];
        // $harga_emas = $zakatmaal->harga_emas = $request['harga_emas'];
        // $haul = 85 * $harga_emas;
        // $zakatmaal->save();

        // return view('zakatmaal.update', ['muzakki' => $muzakki, 'harga_emas' => $harga_emas, 'haul' => $haul]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
