@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Anggota Keluarga</li>
</ol>

  <div class="card">
    <div class="card-header">Form Anggota Keluarga</div>
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
        <form action="{{ route('anggotakeluarga.store') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
          </div>
          <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="number" min="0" class="form-control" id="nomor_nik" name="nomor_nik" value="{{ old('nomor_nik') }}">
          </div>
          <div class="form-group">
            <label for="kk">No. Kartu Keluarga:</label>
            <select class="form-control" name="nomor_kk">
              <option value="">-- Pilih No. Kartu Keluarga --</option>
              @foreach($kartukeluarga as $list)
                <option value="{{ $list->id_kk }}">{{ $list->no_kk}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin:</label>
            <select class="form-control" name="jenis_kelamin">
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir:</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
          </div>
          <div class="form-group">
            <label for="agama">Agama:</label>
            <select class="form-control" name="nama_agama">
              <option value="">-- Pilih Agama --</option>
              @foreach($agama as $list)
                <option value="{{ $list->id_agama }}">{{ $list->nama_agama }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="pendidikan">Pendidikan:</label>
            <select class="form-control" name="pendidikan">
              <option value="">-- Pilih Pendidikan --</option>
              @foreach($pendidikan as $list)
                <option value="{{ $list->id_pendidikan }}">{{ $list->nama_pendidikan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="pekerjaan">Pekerjaan:</label>
            <select class="form-control" name="pekerjaan">
              <option value="">-- Pilih Pekerjaan --</option>
              @foreach($pekerjaan as $list)
                <option value="{{ $list->id_pekerjaan }}">{{ $list->nama_pekerjaan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="status_kawin">Status Perkawinan:</label>
            <select class="form-control" name="status_kawin">
              <option value="">-- Pilih Status Perkawinan --</option>
              @foreach($status as $list)
                <option value="{{ $list->id_status }}">{{ $list->nama_status }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="status_hubkel">Status Hubungan Dalam Keluarga:</label>
            <select class="form-control" name="hubungan_keluarga">
              <option value="">-- Pilih Status Hub. Dalam Keluarga --</option>
              @foreach($hubkeluarga as $list)
                <option value="{{ $list->id_hubkeluarga }}">{{ $list->nama_hubkeluarga }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="kw">Kewarganegaraan:</label>
            <select class="form-control" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}">
              <option value="">Pilih Warga Negara</option>
              <option value="WNI">WNI</option>
              <option value="WNA">WNA</option>
            </select>
          </div>
          <div class="form-group">
            <label for="no_paspor">No. Paspor:</label>
            <input type="number" min="0" class="form-control" id="no_paspor" name="no_paspor" value="{{ old('no_paspor') }}">
          </div>
          <div class="form-group">
            <label for="no_kitap">No. Kitap:</label>
            <input type="number" min="0" class="form-control" id="no_kitap" name="no_kitap" value="{{ old('no_kitap') }}">
          </div>
          <div class="form-group">
            <label for="ayah">Ayah:</label>
            <input type="text" class="form-control" id="ayah" name="ayah" value="{{ old('ayah') }}">
          </div>
          <div class="form-group">
            <label for="ibu">Ibu:</label>
            <input type="text" class="form-control" id="ibu" name="ibu" value="{{ old('ibu') }}">
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
