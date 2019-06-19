@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kartu Keluarga</li>
</ol>

<form action="{{ route('kartukeluarga.store') }}" method="POST">
  {{ csrf_field() }}
  <div class="card">
    <div class="card-header">Form Kartu Keluarga</div>
    <div class="card-body">
      <div class="col-md-8">
        <form>
          <div class="form-group">
            <label for="nokk">Nomor KK:</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" required="">
          </div>
          <div class="form-group">
            <label for="namakk">Nama KK:</label>
            <input type="text" class="form-control" id="nama" name="nama" required="">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat:</label>
            <textarea class="form-control" rows="5" id="alamat" name="alamat" required=""></textarea>
          </div>
          <div class="form-group">
            <label for="rtrw">RT/RW:</label>
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="rt" name="rt" class="form-control" required="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="rw" name="rw" class="form-control" required="">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="kodepos">Kode Pos:</label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" required="">
          </div>
          <div class="form-group">
            <label for="provinsi">Provinsi:</label>
            <input type="text" id="id_provinces" name="id_provinces" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="kotakabupaten">Kota/Kabupaten:</label>
            <input type="text" id="id_cities" name="id_cities" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="kecamatan">Kecamatan:</label>
            <input type="text" class="form-control" id="id_districts" name="id_districts" required="">
          </div>
          <div class="form-group">
            <label for="keluarahandesa">Kelurahan/Desa:</label>
            <input type="text" class="form-control" id="id_villages" name="id_villages" required="">
          </div>
          <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
          <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
          <a href="{{ route('kartukeluarga.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </form>
      </div>    
    </div>
  </div>
<br>


@endsection
