<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KartuKeluargaModel;
use App\ViewKartuKeluargaModel;
use DB;

class KartuKeluargaController extends Controller
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
        $kartukeluarga = ViewKartuKeluargaModel::all();
        return view('kartukeluarga.index', compact('kartukeluarga'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dropdown_wilayah = DB::table('view_villages')
            ->groupBy('name_provinces')
            ->get();
        return view('kartukeluarga.create')->with('dropdown_wilayah', $dropdown_wilayah);
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
            'no_kk' => 'required|unique:tb_kartukeluarga|min:16|max:16',
            'id_villages' => 'required',
            'district_id' => 'required',
            'id_cities' => 'required',
            'id_provinces' => 'required'
        ]);

        $kartukeluarga = new KartuKeluargaModel;
        $kartukeluarga->no_kk = $request['no_kk'];
        $kartukeluarga->alamat = $request['alamat'];
        $kartukeluarga->rt = $request['rt'];
        $kartukeluarga->rw = $request['rw'];
        $kartukeluarga->kode_pos = $request['kode_pos'];
        $kartukeluarga->villages_id = $request['id_villages'];
        $kartukeluarga->save();

        return redirect(route('kartukeluarga.index'))->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kartukeluarga =  KartuKeluargaModel::find($id);
        return view('anggotakeluarga.show', compact('kartukeluarga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kartukeluarga = KartuKeluargaModel::find($id);
        $dropdown_wilayah = DB::table('view_villages')
            ->groupBy('name_provinces')
            ->get();
        return view('kartukeluarga.edit', compact('kartukeluarga', $kartukeluarga))->with('dropdown_wilayah', $dropdown_wilayah);
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
            'no_kk' => 'required|min:16|max:16',
            'id_villages' => 'required',
            'district_id' => 'required',
            'id_cities' => 'required',
            'id_provinces' => 'required'
        ]);
        $kartukeluarga = KartuKeluargaModel::find($id);
        $kartukeluarga->no_kk = $request['no_kk'];
        $kartukeluarga->alamat = $request['alamat'];
        $kartukeluarga->rt = $request['rt'];
        $kartukeluarga->rw = $request['rw'];
        $kartukeluarga->kode_pos = $request['kode_pos'];
        $kartukeluarga->villages_id = $request['id_villages'];
        $kartukeluarga->update();

        return redirect(route('kartukeluarga.index'))->with('info', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_kartukeluarga')->where('id_kk', '=', $id)->delete();
        return back()->with('warning', 'Data Berhasil Dihapus!');
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $a = explode('+', $dependent);
        $data = DB::table('view_villages')
            ->where($select, $value)
            ->groupBy($a[0])
            ->get();
        $output = "<option value=''>Pilih</option>";
        $id = $a[0];
        $nama = $a[1];
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$id . '">
                ' . $row->$nama . '</option>';
        }
        echo $output;
    }
    public function deleteSelected(Request $request)
    {
        foreach ($request['id'] as $id) {
            $kartukeluarga = KartuKeluargaModel::find($id);
            $kartukeluarga->delete();
        }
        return response()->json(['warning' => "Products Deleted successfully."]);
    }
}
