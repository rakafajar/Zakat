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
  <div class="card-header">Form Zakat Fitrah</div>
  <div class="card-body">
    <div class="col-md-8">
      <form action="{{ route('zakatfitrah.update', $zakatfitrah->id_zakatfitrah) }}" method="POST">
        {{ csrf_field() }} {{ method_field('PATCH') }}
        <div class="form-group">
          <label for="muzakki">Muzakki:</label>
          <input type="text" class="form-control" id="muzakki" name="muzakki" value="{{ $zakatfitrah->muzakki_id }}">
        </div>
        <div class="form-group">
          <label for="hargaberas">Harga Beras:</label>
          <input type="text" class="form-control" id="hargaberas" name="hargaberas" placeholder="Rp." value="{{ $zakatfitrah->hargaberas }}">
        </div>
        <div class="form-group">
          <label for="nominal">Nominal:</label>
          <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Rp." value="{{ $zakatfitrah->nominal }}">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('zakatfitrah.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection
