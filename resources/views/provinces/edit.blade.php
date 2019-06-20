@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Provinsi</li>
</ol>

<div class="card">
  <div class="card-header">Form Provinsi</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('provinsi.update', $provinsi->id) }}" method="post">
        {{ csrf_field() }} {{ method_field('PATCH')}}
        <div class="form-group">
          <label for="nama_provinsi">Nama Provinsi:</label>
          <input type="text" class="form-control" id="name_provinsi" name="name_provinsi" value="{{ $provinsi->name}}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('provinsi.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
