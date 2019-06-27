@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Fidyah</li>
</ol>

<div class="card">
  <div class="card-header">Form Fidyah</div>
  <div class="card-body">
    <div class="col-md-8">
      {{-- menampilkan error validasi --}}
      @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      <form action="{{ route('fidyah.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="text" class="form-control" name="nama_fidyah" placeholder="Contoh : Hamba Allah" value="{{ old('nama_fidyah') }}">
        </div>
        <div class="form-group">
          <label for="nominal">Nominal:</label>
          <input type="text" class="form-control" name="nominal_fidyah" placeholder="Rp." value="{{ old('nominal_fidyah') }}"">
        </div>      
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('fidyah.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection
