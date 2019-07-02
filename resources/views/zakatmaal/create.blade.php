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
      <form action="{{ route('zakatmaal.store')}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="sel1">Pilih Muzakki:</label>
          <select class="form-control search" name="id_muzakki">
            <option>-- Pilih Muzakki --</option>
            @foreach($view_muzakki as $list)
            <option value="{{ $list->id_muzakki }}">NIK : {{ $list->nik }} - {{ $list->nama_lengkap }} </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="penghasilan">Penghasilan:</label>
          <input type="number" min="0" class="form-control" name="penghasilan" id="penghasilan" placeholder="Rp.">
        </div>
        <div class="card">
          <div class="card-body">
            <strong>Zakat Maal</strong>
            <hr>
            <div class="form-group">
              <label for="tabungan">Harta Dalam Bentuk Tabungan/Giro/Deposito:</label>
              <input type="number" min="0" class="form-control" name="tabungan" id="tabungan" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="logam">Harta Dalam Bentuk Logam Mulia (Emas/Perak):</label>
              <input type="number" min="0" class="form-control" name="logam" id="logam" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="surat">Harta Dalam Bentuk Surat Berharga:</label>
              <input type="number" min="0" class="form-control" name="surat" id="surat" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="properti">Harta Dalam Bentuk Properti:</label>
              <input type="number" min="0" class="form-control" name="properti" id="properti" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="kendaraan">Harta Dalam Bentuk Kendaraan:</label>
              <input type="number" min="0" class="form-control" name="kendaraan" id="kendaraan" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="koleksi">Harta Dalam Bentuk Koleksi Seni & Barang Antik:</label>
              <input type="number" min="0" class="form-control" name="koleksi" id="koleksi" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="dagang">Harta Dalam Bentuk Stok Barang Dagangan:</label>
              <input type="number" min="0" class="form-control" name="dagang" id="dagang" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="lain">Harta Dalam Bentuk Lainya:</label>
              <input type="number" min="0" class="form-control" name="lain" id="lain" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="hutang">Hutang Jatuh Tempo:</label>
              <input type="number" min="0" class="form-control" name="hutang" id="hutang" placeholder="Rp." onkeyup="sum();" value="0">
            </div>
            <div class="form-group">
              <label for="jml"><strong>Jumlah Harta:</strong></label>
              <input type="number" min="0" class="form-control" name="jml" id="jml" value="" readonly="">
            </div>
          </div>
        </div><br>
        <div class="card">
          <div class="card-body">
            <strong>Nisab Zakat Maal</strong>
            <hr>
            <div class="form-group">
              <label for="harga_emas">Harga Emas:</label>
              <input type="number" min="0" class="form-control" name="harga_emas" id="harga_emas" placeholder="Rp." onkeyup="sum();">
            </div>
            <div class="form-group">
              <label for="haul"><strong>Haul:</strong></label>
              <input type="number" min="0" class="form-control" name="haul" id="haul" value="" readonly>
            </div>            
          </div>
        </div><br>
        <div class="card">
          <div class="card-body">
            <strong>Nisab yang Harus Dibayarkan:</strong>
            <hr>
              <div class="form-group">
                <strong>Wajib Bayar Zakat :</strong> <div id="status"></div>
              </div>
              <div class="form-group">
                <label for="nisab"><strong>Nisab :</strong></label>
                <input type="number" min="0" class="form-control" name="nisab" id="nisab" value="" readonly>
              </div>
            </div>
          </div>
        </div><br>
        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
        <a href="{{ route('zakatmaal.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
      </form>
    </div>    
  </div>
</div>
<br>
@endsection

@section('script')
<script>
  function sum()
  {
    var harga_emas = document.getElementById('harga_emas').value;
    var haul = parseInt(harga_emas) * 85;

    if (!isNaN(haul)) {
      document.getElementById('haul').value = haul;
    }

    var penghasilan = document.getElementById('penghasilan').value;
    var tabungan = document.getElementById('tabungan').value;
    var logam = document.getElementById('logam').value;
    var surat = document.getElementById('surat').value;
    var properti = document.getElementById('properti').value;
    var kendaraan = document.getElementById('kendaraan').value;
    var koleksi = document.getElementById('koleksi').value;
    var dagang = document.getElementById('dagang').value;
    var lain = document.getElementById('lain').value;
    var hutang = document.getElementById('hutang').value;

    //total
    var jml =parseInt(penghasilan) + parseInt(tabungan) + parseInt(logam) + parseInt(surat) + parseInt(properti) + parseInt(kendaraan) + parseInt(koleksi) + parseInt(dagang) + parseInt(lain) - parseInt(hutang);

    if (!isNaN(jml)) {
      document.getElementById('jml').value = jml;
    }


    if (jml >= haul) {
      document.getElementById('status').innerHTML = "<span class='badge badge-success'>WAJIB!</span>"
      var nisab = 0.025 * jml;
      document.getElementById('nisab').value = nisab;

    } else {
      document.getElementById('status').innerHTML = "<span class='badge badge-danger'>TIDAK!</span>"
      document.getElementById('nisab').value = "-";
    }
  }
  
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('.search').select2();
  });
</script>
@endsection
