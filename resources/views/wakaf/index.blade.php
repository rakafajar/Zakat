@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Waqaf</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <a href="{{ route('wakaf.create') }}" class="btn btn-primary btn-sm">
      <i class="fas fa-user-plus"></i> Tambah
    </a>
    <a href="/Zakat/public/laporanwakaf" class="btn btn-success btn-sm" target="_blank">
      <i class="fas fa-print"></i> Cetak
    </a>
    <button onclick="deleteAll()" " class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
  </div>
  <br>
  <div class="col-sm-6">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text bg-light">Total Kas</span>
      </div>
      <input type="text" class="form-control" value="Rp. <?php echo format_uang($kas->jml_kas) ?>" disabled>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <form method="post" id="form-wakaf">
          {!! csrf_field() !!}
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th width="20"><input type="checkbox" value="1" id="select-all"></th>
            <th>No</th>
            <th>Nama Pewakaf</th>
            <th>Jenis Wakaf</th>
            <th>Nominal Wakaf</th>
            <th>Tanggal Bayar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          @foreach($view_wakaf as $list)
          <?php $no++ ?>
          <tr>
            <td><input type="checkbox" name="id[]" value="{{ $list->id_wakaf }}"></td>
            <td>{{$no}}</td>
            <td>{{$list->nama_lengkap}}</td>
            <td>{{$list->jenis_wakaf}}</td>
            <td>
                Rp. <?php echo format_uang($list->nominal_wakaf); ?>
            </td>
            <td>
              <?php
                echo tanggal_indonesia($list->created_at);
              ?>
            </td>
            <th style="text-align: center;">
              <a href="{{ URL::to('wakaf/invoice/'.$list->id_wakaf) }}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
              {{-- <i href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></i> --}}
              <a href="{{route('wakaf.edit', $list->id_wakaf)}}" class="btn btn-warning btn-sm disabled"><i class="fas fa-edit"></i></a>
              <a href="{{ URL::to('wakaf/destroy/'.$list->id_wakaf) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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
				url: "wakaf/hapus",
				type: "POST",
				data: $('#form-wakaf').serialize(),
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
