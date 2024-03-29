@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Zakat Fitrah</li>
</ol>

<div class="card">
  <div class="card-header">Form Edit Zakat Fitrah</div>
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
      <form action="{{ route('zakatfitrah.update', $zakatfitrah->id_zfitrah) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        {{-- <div class="form-group">
            <label for="sel1">Pilih Muzakki:</label>
            <select class="form-control search" name="id_muzakki">
              <option>-- Pilih Muzakki --</option>
              @foreach($muzakki as $list)
              <option value="{{ $list->id_muzakki }}">NIK : {{ $list->nik }} - {{ $list->nama_lengkap }}</option>
              @endforeach
            </select>
          </div> --}}
          {{-- <div class="form-group">
            <label for="sel1">Harga Beras:</label>
            <select class="form-control" name="harga_beras">
              <option>-- Pilih Harga Beras --</option>
              @foreach($harga_beras as $list)
              <option value="{{ $list->harga_beras }}">Rp. <php ? echo format_uang($list->harga_beras) ?></option>
              @endforeach
            </select>
          </div> --}}
          <div class="form-group">
            <label for="Muzaaki">Nama Muzakki :</label>
            <p>{{ $muzakki->nama_lengkap}}</p>
          </div>
          <div class="form-group">
            <label for="Muzaaki">Harga Beras :</label>
            <p>{{ $zakatfitrah->harga_beras}}</p>
          </div>
          <div class="form-group">
            <label for="Muzaaki">Tanggal Sebelum :</label>
            <p>
              <?php
              echo tanggal_indonesia($zakatfitrah->created_at);
              ?>
            </p>
          </div>
          <div class="form-group">
            <label for="tgl_pembayaran">Tanggal Pembayaran Baru:</label>
            <input type="date" class="form-control" id="tgl_pembayaran" name="tgl_pembayaran" value="{{ $zakatfitrah->created_at }}" required>
          </div>
  {{--         <div class="form-group">
            <label for="nominal">Nominal:</label>
            <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Rp.">
          </div> --}}
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        {{-- <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button> --}}
        <a href="{{ route('zakatfitrah.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
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
