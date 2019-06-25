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
  <div class="card-header">Form Edit Mustahiq</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('mustahiq.update', $mustahiq->id_mustahiq) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH')}}
        <div class="form-group{{$errors->has('id_anggotakk') ? ' has-error' : ''}}">
          <label for="anggotakk">No. NIK:</label>
          <select class="form-control" name="id_anggotakk">
              <option value="">-- Pilih No. NIK --</option>
              @foreach($anggotakk as $list)
              <option value="{{ $list->id_anggotakk }}">{{ $list->nik}}</option>
              @endforeach
          </select>
          @if($errors->has('id_anggotakk'))
          <span class="help-block">{{$errors->first('id_anggotakk')}}</span>
          @endif
      </div>
      <div class="form-group{{$errors->has('id_golongan') ? ' has-error' : ''}}">
              <label for="golongan">Golongan:</label>
              <select class="form-control" name="id_golongan">
                  <option value="">-- Pilih Golongan --</option>
                  @foreach($golongan as $list)
                  <option value="{{ $list->id_golongan }}">{{ $list->nama_golongan}}</option>
                  @endforeach
              </select>
              @if($errors->has('id_golongan'))
              <span class="help-block">{{$errors->first('id_golongan')}}</span>
              @endif
      </div>
      <div class="form-group{{$errors->has('wilayah') ? ' has-error' : ''}}">
              <label for="wilayah">Pilih Wilayah:</label>
              <select class="form-control" name="wilayah">
                <option value="">-- Pilih Wilayah --</option>
                <option value="Internal">Internal</option>
                <option value="Eksternal">Eksternal</option>
              </select>
              @if($errors->has('wilayah'))
              <span class="help-block">{{$errors->first('wilayah')}}</span>
              @endif
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
