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
    <div class="card-header">Form Edit Anggota Keluarga</div>
    <div class="card-body">
      <div class="col-md-8">
        <form action="{{ route('anggotakeluarga.update', $anggotakeluarga->id_anggotakk) }}" method="POST">
          {{ csrf_field() }} {{ method_field('PATCH')}}
          <div class="form-group">
            <label for="nama">Nama Lengkap:</label>
            <input type="text" class="form-control" id="nama" name="nama_lengkap" required  value="{{$anggotakeluarga->nama_lengkap}}">
          </div>
          <div class="form-group">
            <label for="nik">NIK:</label>
            <input type="text" class="form-control" id="nik" name="nik" required value="{{$anggotakeluarga->nik}}">
          </div>
          <div class="form-group{{$errors->has('id_kk') ? ' has-error' : ''}}">
            <label for="kk">No. Kartu Keluarga:</label>
            <select class="form-control" name="id_kk">
              <option value="">-- Pilih No. Kartu Keluarga --</option>
              @foreach($kartukeluarga as $list)
                <option value="{{ $list->id_kk }}">{{ $list->no_kk}}</option>
              @endforeach
            </select>
            @if($errors->has('id_kk'))
            <span class="help-block">{{$errors->first('id_kk')}}</span>
            @endif
          </div>
          <div class="form-group{{$errors->has('jk') ? ' has-error' : ''}}">
            <label for="jk">Jenis Kelamin:</label>
            <select class="form-control" name="jk">
              <option value="">-- Pilih Jenis Kelamin --</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
            @if($errors->has('jk'))
            <span class="help-block">{{$errors->first('jk')}}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="tmp_lahir">Tempat Lahir:</label>
            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" required value="{{$anggotakeluarga->tmp_lahir}}">
          </div>
          <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir:</label>
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="{{$anggotakeluarga->tgl_lahir}}">
          </div>
          <div class="form-group{{$errors->has('id_agama') ? ' has-error' : ''}}">
            <label for="agama">Agama:</label>
            <select class="form-control" name="id_agama">
              <option value="">-- Pilih Agama --</option>
              @foreach($agama as $list)
                <option value="{{ $list->id_agama }}">{{ $list->nama_agama }}</option>
              @endforeach
            </select>
            @if($errors->has('id_agama'))
            <span class="help-block">{{$errors->first('id_agama')}}</span>
            @endif
          </div>
          <div class="form-group{{$errors->has('id_pendidikan') ? ' has-error' : ''}}">
            <label for="pendidikan">Pendidikan:</label>
            <select class="form-control" name="id_pendidikan">
              <option value="">-- Pilih Pendidikan --</option>
              @foreach($pendidikan as $list)
                <option value="{{ $list->id_pendidikan }}">{{ $list->nama_pendidikan }}</option>
              @endforeach
            </select>
            @if($errors->has('id_pendidikan'))
            <span class="help-block">{{$errors->first('id_pendidikan')}}</span>
            @endif
          </div>
          <div class="form-group{{$errors->has('id_pekerjaan') ? ' has-error' : ''}}">
            <label for="pekerjaan">Pekerjaan:</label>
            <select class="form-control" name="id_pekerjaan">
              <option value="">-- Pilih Pekerjaan --</option>
              @foreach($pekerjaan as $list)
                <option value="{{ $list->id_pekerjaan }}">{{ $list->nama_pekerjaan }}</option>
              @endforeach
            </select>
            @if($errors->has('id_pekerjaan'))
            <span class="help-block">{{$errors->first('id_pekerjaan')}}</span>
            @endif
          </div>
          <div class="form-group{{$errors->has('id_status_kawin') ? ' has-error' : ''}}">
            <label for="status_kawin">Status Perkawinan:</label>
            <select class="form-control" name="id_status_kawin">
              <option value="">-- Pilih Status Perkawinan --</option>
              @foreach($status as $list)
                <option value="{{ $list->id_status }}">{{ $list->nama_status }}</option>
              @endforeach
            </select>
            @if($errors->has('id_status_kawin'))
            <span class="help-block">{{$errors->first('id_status_kawin')}}</span>
            @endif
          </div>
          <div class="form-group{{$errors->has('id_status_hubkel') ? ' has-error' : ''}}">
            <label for="status_hubkel">Status Hubungan Dalam Keluarga:</label>
            <select class="form-control" name="id_status_hubkel">
              <option value="">-- Pilih Status Hub. Dalam Keluarga --</option>
              @foreach($hubkeluarga as $list)
                <option value="{{ $list->id_hubkeluarga }}">{{ $list->nama_hubkeluarga }}</option>
              @endforeach
            </select>
            @if($errors->has('id_status_hubkel'))
            <span class="help-block">{{$errors->first('id_status_hubkel')}}</span>
            @endif
          </div>
          <div class="form-group{{$errors->has('kewarganegaraan') ? ' has-error' : ''}}">
            <label for="kw">Kewarganegaraan:</label>
            <select class="form-control" name="kewarganegaraan">
              <option value="">Pilih Warga Negara</option>
              <option value="WNI">WNI</option>
              <option value="WNA">WNA</option>
            </select>
            @if($errors->has('kewarganegaraan'))
            <span class="help-block">{{$errors->first('kewarganegaraan')}}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="no_paspor">No. Paspor:</label>
            <input type="text" class="form-control" id="no_paspor" name="no_paspor" required value="{{$anggotakeluarga->no_paspor}}">
          </div>
          <div class="form-group">
            <label for="no_kitap">No. Kitap:</label>
            <input type="text" class="form-control" id="no_kitap" name="no_kitap" required value="{{$anggotakeluarga->no_kitap}}">
          </div>
          <div class="form-group">
            <label for="ayah">Ayah:</label>
            <input type="text" class="form-control" id="ayah" name="ayah" required value="{{$anggotakeluarga->ayah}}">
          </div>
          <div class="form-group">
            <label for="ibu">Ibu:</label>
            <input type="text" class="form-control" id="ibu" name="ibu" required value="{{$anggotakeluarga->ibu}}">
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
