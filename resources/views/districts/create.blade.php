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
      <form action="{{ route('kecamatan.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="id_kecamatan">ID Kecamatan:</label>
          <input type="text" class="form-control" id="id_districts" name="id_districts">
        </div>
        <div class="form-group">
          <label for="provinsi">Pilih Kota/Kabupaten:</label>
          <select class="form-control" id="city_id" name="city_id">
            <option>-- Pilih Kecamatan --</option>
            @foreach($lihatkotakab as $hasil)
            <option value="{{ $hasil->id }}">{{ $hasil->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama Kecamatan:</label>
          <input type="text" class="form-control" id="name_districts" name="name_districts">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('kecamatan.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection
