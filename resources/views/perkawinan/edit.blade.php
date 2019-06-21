@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Perkawinan</li>
</ol>

<div class="card">
  <div class="card-header">Form Perkawinan</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('perkawinan.update', $status_perkawinan->id_status) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="form-group">
          <label for="status_perkawinan">Status Perkawinan:</label>
          <input type="text" class="form-control" id="nama_status" name="nama_status" value="{{$status_perkawinan->nama_status}}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('perkawinan.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
