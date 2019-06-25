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
    <div class="card-header">Data Keluarga</div>
    <div class="card-body">
        <div class="col-md-8">
            <p>Nomor KK :{{$kk->nomor_kk}}</p>
            <p>Nomor NIK : {{$anggotakeluarga->nik}}</p>
            <p>Nama Lengkap : {{$anggotakeluarga->nama_lengkap}}</p>
            <p>Jenis Kelamin : {{$anggotakeluarga->jk}}</p>
            <p>Tempat/Tanggal Lahir : {{$anggotakeluarga->tmp_lahir}} / <?php echo tanggal_indonesia($anggotakeluarga->tgl_lahir); ?></p>
            <p>Agama : </p>
            <p>Pendidikan Terakhir : </p>
            <p>Pekerjaan : </p>
            <p>Status Kawin : </p>
            <p>Status Hubungan Keluarga : </p>
            <p>Warga Negara : {{$anggotakeluarga->kewarganegaraan}}</p>
            <p>Nomor Paspor : {{$anggotakeluarga->no_paspor}}</p>
            <p>Nomor Kitap : {{$anggotakeluarga->no_kitap}}</p>
            <p>Nama Ayah : {{$anggotakeluarga->ayah}}</p>
            <p>Nama Ibu : {{$anggotakeluarga->ibu}}</p>
        </div>    
    </div>
</div>
<br>
@endsection
