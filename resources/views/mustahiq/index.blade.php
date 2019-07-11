@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Mustahik</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <a href="{{ route('mustahiq.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-user-plus"></i> Tambah
    </a>
    <a onclick="deleteAll()" class="btn btn-danger btn-sm">
        <i class="fa fa-trash"></i>
        Hapus
    </a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <form method="post" id="form-produk">
        {!! csrf_field() !!}
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="20"><input type="checkbox" value="1" id="select-all"></th>
            <th width="10">No</th>
            <th>NIK</th>
            <th>Nama Mustahik</th>
            <th>Golongan Mustahik</th>
            <th>Wilayah</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach($mustahiq as $list)
            <?php $no++ ?>
            <tr>
            <td><input type="checkbox" name="id[]" value="{{ $list->id_mustahiq }}"></td>
            <td>{{ $no }}</td>
            <td>{{$list->nik}}</td>
            <td>{{ $list->nama_lengkap }}</td>
            <td>{{ $list->nama_golongan }}</td>
            <td>{{ $list->wilayah }}</td> 
            <th style="text-align: center;">
                <a href="{{ route('mustahiq.edit', $list->id_mustahiq )}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <a href="{{ URL::to('mustahiq/destroy/'.$list->id_mustahiq) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
				url: "mustahiq/hapus",
				type: "POST",
				data: $('#form-produk').serialize(),
				success: function(data){
					table.ajax.reload();
				},

			});
		}
	}
</script>
@endsection