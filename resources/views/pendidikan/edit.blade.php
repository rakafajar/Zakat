@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Pendidikan</li>
</ol>

<div class="card">
  <div class="card-header">Form Edit Pendidikan</div>
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
        <form action="{{ route('pendidikan.update', $pendidikan->id_pendidikan) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
            <div class="form-group">
            <label for="pendidikan">Nama Pendidikan:</label>
            <input type="text" class="form-control" id="nama_pendidikan" name="nama_pendidikan" value="{{ $pendidikan->nama_pendidikan}}">
            </div>
            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
            {{-- <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button> --}}
            <a href="{{ route('pendidikan.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </form>
    </div>    
  </div>
</div>
<br>
@endsection
