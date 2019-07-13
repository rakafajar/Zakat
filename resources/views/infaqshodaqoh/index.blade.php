@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Infaq & Shodaqoh</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
          	<a href="{{ route('infaqshadaqah.create') }}" class="btn btn-primary btn-sm">
          		<i class="fas fa-coins"></i> Bayar Infaq & Shadaqah
            </a> 
            <a href="/Zakat/public/laporaninsa" class="btn btn-success btn-sm" target="_blank">
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
              <form method="post" id="form-insha">
                  {!! csrf_field() !!}
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Tanggal Bayar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($insha as $list)
                  <?php $no++; ?>
                  <tr>
                    <td><input type="checkbox" name="id[]" value="{{ $list->id_insha }}"></td>
                    <td>{{ $no }}</td>
                    <td>{{ $list->nama_lengkap }}</td>
                    <td>
                      Rp. 
                      <?php
                        echo format_uang($list->nominal_insha);
                      ?>
                    </td>
                    <td>
                      <?php
                        echo tanggal_indonesia($list->created_at);
                      ?>
                    </td>
                    <th style="text-align: center;">
                      <a href="{{ URL::to('infaqshadaqah/invoice/'.$list->id_insha) }}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                    	{{-- <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a> --}}
                    	<a href="{{ route('infaqshadaqah.edit', $list->id_insha) }}" class="btn btn-warning btn-sm disabled"><i class="fas fa-edit"></i></a>
                    	<a href="{{ URL::to('infaqshadaqah/destroy/'.$list->id_insha) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
				url: "infaqshadaqah/hapus",
				type: "POST",
				data: $('#form-insha').serialize(),
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
