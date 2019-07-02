@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Mustahik</li>
</ol>

<div class="card">
  <div class="card-header">Form Mustahik</div>
  <div class="card-body">
    <div class="col-md-8">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
      <form action="{{ route('mustahiq.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="anggotakk">No. NIK:</label>
            <select class="form-control search" name="nomor_kk">
                <option value="">-- Pilih No. NIK --</option>
                @foreach($anggotakk as $list)
                <option value="{{ $list->id_anggotakk }}">{{ $list->nik}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
                <label for="golongan">Golongan:</label>
                <select class="form-control" name="golongan">
                    <option value="">-- Pilih Golongan --</option>
                    @foreach($golongan as $list)
                    <option value="{{ $list->id_golongan }}">{{ $list->nama_golongan}}</option>
                    @endforeach
                </select>
        </div>
        <div class="form-group">
                <label for="wilayah">Pilih Wilayah:</label>
                <select class="form-control" name="wilayah">
                  <option value="">-- Pilih Wilayah --</option>
                  <option value="Internal">Internal</option>
                  <option value="Eksternal">Eksternal</option>
                </select>
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('mustahiq.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
@section('script')
<script>  
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
  $('.search').select2();
});
</script>
@endsection
