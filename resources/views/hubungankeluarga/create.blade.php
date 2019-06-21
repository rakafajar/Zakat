@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Hubungan Keluarga</li>
</ol>

<div class="card">
  <div class="card-header">Form Hubungan Keluarga</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('hubungankeluarga.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="hubkeluarga">Hubungan Keluarga:</label>
          <input type="text" class="form-control" id="nama_hubkeluarga" name="nama_hubkeluarga">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('hubungankeluarga.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
