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
      <form action="{{ route('infaqshadaqah.store') }}" method="POST">
        {{ csrf_field() }}
       <div class="form-group">
          {{-- <label for="kas_insha">Total Kas:</label> --}}
          <input type="hidden" min="0" class="form-control" name="jml_kas" value="{{ $kas->jml_kas }}" readonly>
        </div>
        <div class="form-group">
          <label for="sel1">Pilih Insha:</label>
          <select class="form-control search" name="nama_insha">
            <option value="">-- Pilih Nama --</option>
            @foreach($anggotakk as $list)
            <option value="{{ $list->id_anggotakk }}">NIK : {{ $list->nik }} - {{ $list->nama_lengkap }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="nominal">Nominal:</label>
          <input type="number" min="0" class="form-control" name="nominal_insha" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="tgl_pembayaran">Tanggal Pembayaran:</label>
          <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran" value="{{ old('tgl_pembayaran') }}" required>
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
@section('script')
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      $('.search').select2();
    });
</script>    
@endsection
