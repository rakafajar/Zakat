@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Waqaf</li>
</ol>

<div class="card">
  <div class="card-header">Form Waqaf</div>
  <div class="card-body">
    <div class="col-md-8">
        <form action="{{ route('wakaf.update', $wakaf->id_wakaf) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="form-group">
          <label for="nama">Nama Pewakaf:</label>
          <input type="text" class="form-control" id="nama_wakaf" name="nama_wakaf" value="{{$wakaf->nama_wakaf}}">
        </div>
        <div class="form-group">
          <label for="jenis_wakaf">Jenis Wakaf:</label>
          <select class="form-control" name="id_jeniswakaf" id="id_jeniswakaf">
            <option value="">-- Pilih Jenis Wakaf--</option>
            @foreach($jenis_wakaf as $list)
              <option value="{{ $list->id_jeniswakaf }}">{{ $list->jenis_wakaf }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nominal">Nominal:</label>
          <input type="text" class="form-control" id="nominal_wakaf" placeholder="Rp." name="nominal_wakaf" value="{{$wakaf->nominal_wakaf}}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('wakaf.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection