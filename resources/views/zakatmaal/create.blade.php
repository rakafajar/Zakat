@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Zakat Maal</li>
</ol>

<div class="card">
  <div class="card-header">Form Zakat Maal</div>
  <div class="card-body">
    <div class="col-md-8">
      <form>
        <div class="form-group">
          <label for="uang">Harta Dalam Bentuk Uang Tunai/Tabungan/Deposito:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="surat">Harta Dalam Bentuk Saham atau Surat-surat Berharga:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="properti">Harta Dalam Bentuk Properti:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="logam">Harta Dalam Bentuk Logam Mulia Emas/Perak:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="suratkendaraan">Harta Dalam Bentuk Surat Kendaraan:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="simpanan">Jumlah Harta Simpanan:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="hargaemas">Harga Emas perGram:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="zakatmaal">Jumlah Zakat Maal yang Wajib Di Bayar Pertahun:</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <div class="form-group">
          <label for="bulan">Atau Jika Dibayarkan Tiap Bulan (1/12):</label>
          <input type="text" class="form-control" id="" placeholder="Rp.">
        </div>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('zakatmaal.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>


@endsection
