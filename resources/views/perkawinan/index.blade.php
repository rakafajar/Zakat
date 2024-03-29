@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Perkawinan</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <a href="{{ route('perkawinan.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah
    </a>
    <button onclick="deleteAll()" " class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
    </div>
    <div class="card-body">
    <div class="table-responsive">
    <form method="post" id="form-perkawinan">
            {!! csrf_field() !!}
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="20"><input type="checkbox" value="1" id="select-all"></th>
            <th width="10">No</th>
            <th>Status Perkawinan</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach($status_perkawinan as $list)
            <?php $no++ ?>
            <tr>
            <td><input type="checkbox" name="id[]" value="{{ $list->id_status }}"></td>
            <td>{{ $no }}</td>
            <td>{{ $list->nama_status }}</td>
            <th style="text-align: center;">
                <a href="{{ route('perkawinan.edit', $list->id_status) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <a href="{{ URL::to('perkawinan/destroy/'.$list->id_status) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
				url: "perkawinan/hapus",
				type: "POST",
				data: $('#form-perkawinan').serialize(),
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