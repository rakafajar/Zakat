@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Anggota Keluarga</li>
</ol>

<form action="{{ route('anggotakeluarga.store') }}" method="POST">
  {{ csrf_field() }}
  <div class="card">
    <div class="card-header">Form Anggota Keluarga</div>
    <div class="card-body">
      <div class="col-md-8">
        <form>
          <div class="form-group">
            <label for="idkk">Nomor KK:</label>
            <select class="form-control" id="kk_id" name="kk_id">
              <option value="">-- Pilih No KK --</option>
              @foreach($kartukeluarga as $list)
              <option value="{{ $list->id_kk }}">{{ $list->no_kk}}</option>
              @endforeach
            </select>
          </div> 
          <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama" name="nama">
          </div>
          <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" class="form-control" id="nik" name="nik">
          </div>
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
              <option>Laki - Laki</option>
              <option>Perempuan</option>
            </select>
          </div> 
          <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir:</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
          </div>
          <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
          </div>
          <div class="form-group">
            <label for="agama">Agama:</label>
            <select class="form-control" id="agama" name="agama">
              <option>Islam</option>
              <option>Kristen Protestan</option>
              <option>Katolik</option>
              <option>Hindu</option>
              <option>Buddha</option>
              <option>Kong Hu Cu</option>
            </select>
          </div> 
          <div class="form-group">
            <label for="pendidikan">Pendidikan:</label>
            <select class="form-control" id="pendidikan" name="pendidikan">
              <option>Tidak / Belum Sekolah</option>
              <option>Belum Tamat SD / Sederajat</option>
              <option>Tamat SD / Sederajat</option>
              <option>SLTP / Sederajat</option>
              <option>SLTA / Sederajat</option>
              <option>Diploma I / II</option>
              <option>Akademia / Diploma III</option>
              <option>Diploma IV / Strata I</option>
              <option>Strata II</option>
              <option>Strata III</option>
              <option>Lainnya ~</option>
            </select>
          </div>
          <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
          </div> 
          <div class="form-group">
            <label for="status_kawin">Status Kawin:</label>
            <select class="form-control" id="status_kawin" name="status_kawin">
              <option>Belum Kawin</option>
              <option>Kawin Tercatat</option>
              <option>Kawin Tidak Tercatat</option>
              <option>Cerai Hidup</option>
              <option>Cerai Mati</option>
            </select>
          </div>
          <div class="form-group">
            <label for="hubungan_keluarga">Status Hubungan:</label>
            <select class="form-control" id="hubungan_keluarga" name="hubungan_keluarga">
              <option>Kepala Keluarga</option>
              <option>Suami</option>
              <option>Istri</option>
              <option>Anak</option>
              <option>Menantu</option>
              <option>Cucu</option>
              <option>Nenek</option>
              <option>Kakek</option>
              <option>Pembantu Rumah Tangga</option>
            </select>
          </div>
          <div class="form-group">
            <label for="hubungan_keluarga">Status Hubungan:</label>
            <select class="form-control" id="hubungan_keluarga" name="hubungan_keluarga">
              <option>Kepala Keluarga</option>
              <option>Suami</option>
              <option>Istri</option>
              <option>Anak</option>
              <option>Menantu</option>
              <option>Cucu</option>
              <option>Nenek</option>
              <option>Kakek</option>
              <option>Pembantu Rumah Tangga</option>
            </select>
          </div>
          <div class="form-group">
            <label for="kewarga">Status Hubungan:</label>
            <select class="form-control" id="kewarga" name="kewarga">
              <option>WNI</option>
              <option>WNA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="no_paspor">No Paspor:</label>
            <input type="text" class="form-control" id="no_paspor" name="no_paspor">
          </div>       
          <div class="form-group">
            <label for="no_kitap ">No KITAP:</label>
            <input type="text" class="form-control" id="no_kitap " name="no_kitap">
          </div>
          <div class="form-group">
            <label for="nama_ayah ">Nama Ayah:</label>
            <input type="text" class="form-control" id="nama_ayah " name="nama_ayah">
          </div>
          <div class="form-group">
            <label for="nama_ibu ">Nama Ibu:</label>
            <input type="text" class="form-control" id="nama_ibu " name="nama_ibu">
          </div>     
          <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
          <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
          <a href="{{ route('anggotakeluarga.index') }}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
        </form>
      </div>    
    </div>
  </div>
  <br>
@endsection
