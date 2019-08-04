@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Pengeluaran Wakaf</li>
</ol>

<div class="card">
  <div class="card-header">Form Pengeluaran Wakaf</div>
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
      <form action="{{ route('pengeluaranwakaf.update', $pengeluaran->id_peng_wakaf) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH')}}
        <div class="form-group">
            <label for="jml_pengeluaran">Total Pengeluaran :</label>
            <p>Rp.
                <?php
                echo format_uang($pengeluaran->jml_peng_wakaf); 
              ?>
            </p>
        </div>
        <div class="form-group">
            <label for="tgl_pengeluaran">Keterangan :</label>
            <p>{{$pengeluaran->keterangan}}</p>
        </div>
        <div class="form-group">
            <label for="tgl_pengeluaran">Tanggal Pengeluaran Sebelumnya :</label>
            <p>
              <?php
                echo tanggal_indonesia($pengeluaran->created_at); 
              ?>
            </p>
        </div>
        <div class="form-group">
          <label for="tgl_pengeluaran">Tanggal Pengeluaran Baru:</label>
          <input type="date" class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran" value="{{ $pengeluaran->created_at }}" required>
        </div>          
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        {{-- <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button> --}}
        <a href="{{ route('pengeluaranwakaf.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection

