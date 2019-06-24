@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Muzakki</li>
</ol>

<div class="card">
  <div class="card-header">Form Muzakki</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('muzakki.update', $muzakki->id_muzakki) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="form-group">
          <label for="kkid">Nomor KK:</label>
          <input type="text" class="form-control" id="id_kk" name="id_kk" value="{{ $muzakki->id_kk}}">
        </div>
        <div class="form-group">
          <label for="idanggotakk">NIK:</label>
          <input type="text" class="form-control" id="id_anggotakk" name="id_anggotakk" value="{{ $muzakki->id_anggotakk}}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('muzakki.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
