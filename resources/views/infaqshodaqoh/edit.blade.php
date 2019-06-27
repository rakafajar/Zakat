@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Infaq & Shodaqoh</li>
</ol>

<div class="card">
  <div class="card-header">Form Infaq & Shodaqoh</div>
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
      <form action="{{ route('infaqshadaqah.update', $insha->id_insha) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH')}}
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" class="form-control" name="nama_insha" value="{{ $insha->nama_insha }}">
        </div>
        <div class="form-group">
          <label for="nominal">Nominal:</label>
          <input type="number" min="0" class="form-control" name="nominal_insha" value="{{ $insha->nominal_insha }}">
        </div>      
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('infaqshadaqah.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection
