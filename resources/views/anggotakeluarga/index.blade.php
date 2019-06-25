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
                    <th>Hubungan Keluarga</th>
                    <th width="100">Action</th>
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
                    <td>{{ $list->nama_hubkeluarga }}</td>
                    <th style="text-align: center;" width="100">
                      <a href="{{ route('anggotakeluarga.show', $list->id_anggotakk)}}" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="{{ route('anggotakeluarga.edit', $list->id_anggotakk)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
