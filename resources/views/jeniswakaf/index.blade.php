@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Jenis Wakaf</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="{{ route('jeniswakaf.create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah
            </a>
            <button onclick="deleteAll()" " class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
            <form method="post" id="form-jwakaf">
                {!! csrf_field() !!}
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                    <th>No.</th>
                    <th>Jenis Wakaf</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($jenis_wakaf as $list)
                  <?php $no++; ?>
                  <tr>
                    <td><input type="checkbox" name="id[]" value="{{ $list->id_jeniswakaf }}"></td>
                    <td>{{ $no }}</td>
                    <td>{{ $list->jenis_wakaf }}</td>
                    <th style="text-align: center;">
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="{{ route('jeniswakaf.edit', $list->id_jeniswakaf) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="{{ URL::to('jeniswakaf/destroy/'.$list->id_jeniswakaf) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
				url: "jeniswakaf/hapus",
				type: "POST",
				data: $('#form-jwakaf').serialize(),
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
