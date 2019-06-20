@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kecamatan</li>
</ol>

<div class="card">
  <div class="card-header">Form Kecamatan</div>
  <div class="card-body">
    <div class="col-md-8">
      <form>
        <div class="form-group">
          <label for="provinsi">Pilih Kota/Kabupaten:</label>
          <select class="form-control" id="jenis" name="jenis">
            <option>-</option>
            <option name="kotakabupaten" value="Bandung">Bandung</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama Kecamatan:</label>
          <input type="text" class="form-control" id="">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection
