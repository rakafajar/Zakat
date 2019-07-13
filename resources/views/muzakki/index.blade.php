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
		<a onclick="deleteAll()" class="btn btn-danger btn-sm">
                <i class="fa fa-trash"></i>
                Hapus
        </a>
	</div>
	<div class="card-body">
	<div class="table-responsive">
	<form method="post" id="form-muzakki">
			{!! csrf_field() !!}
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th width="20"><input type="checkbox" value="1" id="select-all"></th>
					<th width="10">No</th>
					<th>Nomor KK</th>
					<th>NIK</th>
					<th>Nama Lengkap</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 0; ?>
				@foreach($muzakki as $list)
				<?php $no++ ?>
				<tr>
				<td><input type="checkbox" name="id[]" value="{{ $list->id_muzakki }}"></td>
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
		</form>
		</div>
		</div>
	</div> 
@endsection
@section('script')
<!-- Script Untuk Ceklis Semua -->
<script type="text/javascript">
	$('#select-all').click(function(){
		$('input[type="checkbox"]').prop('checked', this.checked);
	});

	//Menghapus Semua Data yang dicentang
	function deleteAll(){
		if ($('input:checked').length<1) {
			alert('Pilih data yang akan di hapus!')
		} else if (confirm("Apakah yakin akan menghapus semua data terpilih?")){
			$.ajax({
				url: "muzakki/hapus",
				type: "POST",
				data: $('#form-muzakki').serialize(),
				success: function(data){
					location.reload();
				},
				error: function(data){
					alert("Tidak Dapat Menghapus Data!");
				}
			});
		}
	}
</script>
@endsection