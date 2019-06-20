@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kartu Keluarga</li>
</ol>

<form action="{{ route('kartukeluarga.update', $kartukeluarga->id_kk) }}" method="POST">
  {{ csrf_field() }} {{ method_field('PATCH')}}
  <div class="card">
    <div class="card-header">Form Edit Kartu Keluarga</div>
    <div class="card-body">
      <div class="col-md-8">
        <div class="form-group">
          <label for="nokk">Nomor KK:</label>
          <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $kartukeluarga->no_kk}}">
        </div>
        <div class="form-group">
          <label for="alamat">Alamat:</label>
          <textarea class="form-control" rows="5" id="alamat" name="alamat" ></textarea>
        </div>
        <div class="form-group">
          <label for="rtrw">RT/RW:</label>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="rt" name="rt" class="form-control" value="{{ $kartukeluarga->rt}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-label-group">
                <input type="text" id="rw" name="rw" class="form-control" value="{{ $kartukeluarga->rw}}">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="kodepos">Kode Pos:</label>
          <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $kartukeluarga->kode_pos}}">
        </div>
        <div class="form-group">
          <label for="provinsi">Provinsi:</label>
          <input type="text" id="provinces_id" name="provinces_id" class="form-control" value="{{ $kartukeluarga->provinces_id }}">
        </div>
        <div class="form-group">
          <label for="kotakabupaten">Kota/Kabupaten:</label>
          <input type="text" id="cities_id" name="cities_id" class="form-control" value="{{ $kartukeluarga->cities_id}}">
        </div>
        <div class="form-group">
          <label for="kecamatan">Kecamatan:</label>
          <input type="text" class="form-control" id="districts_id" name="districts_id" value="{{ $kartukeluarga->districts_id }}">
        </div>
        <div class="form-group">
          <label for="keluarahandesa">Kelurahan/Desa:</label>
          <input type="text" class="form-control" id="villages_id" name="villages_id" value="{{ $kartukeluarga->villages_id }}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
      </div>
    </div>
  </div>
</form>
<br>

@endsection
