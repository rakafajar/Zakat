@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Muzakki</li>
</ol>
<div class="card mb-3">
	<div class="card-header">
		<a href="{{ route('muzakki.create') }}" class="btn btn-primary btn-sm">
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
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0; ?>
				@foreach($muzakki as $list)
				<?php $no++ ?>
				<tr>
				<td>{{ $no }}</td>
				<td>{{ $list->no_kk }}</td>
				<td>{{ $list->nik }}</td>
				<td>{{ $list->nama_lengkap }}</td>
				<th style="text-align: center;">
					<a href="{{ route('muzakki.edit', $list->id_muzakki )}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
					<a href="{{ URL::to('muzakki/destroy/'.$list->id_muzakki) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
				</th>
				</tr>
				@endforeach
			</tbody>
			</table>
		</div>
		</div>
	</div> 
@endsection