@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kota/Kabupaten</li>
</ol>

<div class="card">
  <div class="card-header">Form Kota/Kabupaten</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('kotakabupaten.update', $kotakabupaten->id) }}" method="post">
        {{ csrf_field() }} {{ method_field('PATCH')}}
        <div class="form-group">
          <label for="provinsi">Pilih Provinsi:</label>
          <select type="text" id="province_id" class="form-control" name="province_id">
            <option value="">-- Pilih Kategori --</option>
            @foreach($lihatprovinsi as $hasil)
            <option value="{{ $hasil->id }}">{{ $hasil->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nama">Nama Kota/Kabupaten:</label>
          <input type="text" class="form-control" id="name_kotakabupaten" name="name_kotakabupaten" value="{{ $kotakabupaten->name }}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('kotakabupaten.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection
