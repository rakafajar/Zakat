@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kartu Keluarga</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="{{ route('kartukeluarga.create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-user-plus"></i> Tambah
            </a>
            <button onclick="deleteAll()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <form method="post" id="form-kartukeluarga">
                {!! csrf_field() !!}
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                    <th width="10">No</th>
                    <th>Nomor KK</th>
                    <th>Alamat</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Kode Pos</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($kartukeluarga as $list)
                  <?php $no++ ; ?>
                  <tr>
                    <td><input type="checkbox" name="id[]" value="{{ $list->id_kk }}"></td>
                    <td>{{ $no}} </td>
                    <td width="10">{{ $list->no_kk }}</td>
                    <td width="10">{{ $list->alamat}}</td>
                    <td>{{ $list->name_provinces }}</td>
                    <td>{{ $list->name_cities }}</td>
                    <td>{{ $list->name_district }}</td>
                    <td>{{ $list->name_villages }}</td>
                    <td>{{ $list->kode_pos}}</td>
                    <th style="text-align: center;">
                      <a href="{{ route('anggotakeluarga.show', $list->id_kk)}}" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="{!! route('kartukeluarga.edit', [$list->id_kk]) !!}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="{{ URL::to('kartukeluarga/destroy/'.$list->id_kk) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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
				url: "kartukeluarga/hapus",
				type: "POST",
				data: $('#form-kartukeluarga').serialize(),
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

