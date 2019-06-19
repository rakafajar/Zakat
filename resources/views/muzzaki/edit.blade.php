@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Muzzaki</li>
</ol>

<div class="card">
  <div class="card-header">Form Muzzaki</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('muzzaki.update', $muzzaki->id_muzzaki) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="form-group">
          <label for="kkid">Nomor KK:</label>
          <input type="text" class="form-control" id="kartukeluarga" name="kartukeluarga" value="{{ $muzzaki->kk_id}}">
        </div>
        <div class="form-group">
          <label for="nik">NIK:</label>
          <input type="text" class="form-control" id="nik" name="nik" value="{{ $muzzaki->anggota_id}}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('muzzaki.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
