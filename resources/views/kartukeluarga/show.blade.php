@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kartu Keluarga</li>
</ol>


@foreach ($kartukeluarga as $p)
<div class="card">
    <div class="card-header">Anggota Keluarga</div>
    <div class="card-body">
        <div class="col-md-8">
            <p>NIK : {{$p->nik}} </p>
            <p>Nama Anggota : {{$p->nama_lengkap}}</p>
            <p>Tempat: {{$p->tmp_lahir}} </p>
            <p>Tgl Lahir : <?php echo tanggal_indonesia($p->tgl_lahir) ?> </p>
            <p>Jenis Kelamin : {{$p->jk}} </p>
            <p>Agama : {{$p->nama_agama}}</p>
            <p>Pendidikan : {{$p->nama_pendidikan}}</p>
            <p>Pekerjaan : {{$p->nama_pekerjaan}}</p>
            <p>Status Kawin : {{$p->nama_status}}</p>
            <p>Hubungan Keluarga : {{$p->nama_hubkeluarga}}</p>
            <p>Kewarganegaraan : {{$p->kewarganegaraan}}</p>
            <p>Paspor : {{$p->no_paspor}}</p>
            <p>Kitap : {{$p->no_kitap}}</p>
            <p>Ayah : {{$p->ayah}}</p>
            <p>Ibu : {{$p->ibu}}</p>
        </div>    
    </div>
</div>
<br>
@endforeach




@endsection
