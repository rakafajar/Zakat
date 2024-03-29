@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Jenis Wakaf</li>
</ol>

<div class="card">
  <div class="card-header">Jenis Wakaf</div>
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
      <form action="{{ route('jeniswakaf.update', $jenis_wakaf->id_jeniswakaf) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="form-group">
          <label for="agama">Jenis Wakaf:</label>
          <input type="text" class="form-control" name="jenis_wakaf" value="{{ $jenis_wakaf->jenis_wakaf }}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        {{-- <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button> --}}
        <a href="{{ route('jeniswakaf.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection
