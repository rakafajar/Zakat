@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Mustahiq</li>
</ol>

<div class="card">
  <div class="card-header">Form Mustahiq</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('golongan.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="Mustahiq">Nama Golongan Mustahiq:</label>
          <input type="text" class="form-control" id="nama_golongan" name="nama_golongan">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('golongan.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
