@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Anggota Keluarga</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
          	<a href="{{ route('anggotakeluarga.create') }}" class="btn btn-primary btn-sm">
          		<i class="fas fa-user-plus"></i> Tambah
          	</a>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>Nomor KK</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Status Kawin</th>
                    <th>Hubungan Keluarga</th>
                    <th>Kewarga Negara</th>
                    <th>Paspor</th>
                    <th>Kitap</th>
                    <th>Ayah</th>
                    <th>Ibu</th>
                    <th width="1000">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($anggotakeluarga as $list)
                  <?php $no++; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $list->no_kk }}</td>
                    <td>{{ $list->nik }}</td>
                    <td>{{ $list->nama_lengkap }}</td>
                    <td>{{ $list->jk }}</td>
                    <td>{{ $list->tmp_lahir }}</td>
                    <td>{{ $list->tgl_lahir }}</td>
                    <td>{{ $list->nama_agama }}</td>
                    <td>{{ $list->nama_pendidikan }}</td>
                    <td>{{ $list->nama_pekerjaan }}</td>
                    <td>{{ $list->nama_status }}</td>
                    <td>{{ $list->nama_hubkeluarga }}</td>
                    <td>{{ $list->kewarganegaraan }}</td>
                    <td>{{ $list->no_paspor }}</td>
                    <td>{{ $list->no_kitap }}</td>
                    <td>{{ $list->ayah }}</td>
                    <td>{{ $list->ibu }}</td>
                    <th style="text-align: center;" width="100">
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="{{ URL::to('anggotakeluarga/destroy/'.$list->id_anggotakk)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </th>
                  </tr>
                </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
@endsection
