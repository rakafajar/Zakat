@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Pengeluaran Zakat Maal</li>
</ol>

        <div class="card mb-3">
          <div class="card-header">
            Form Zakat Maal
          </div>
          <div class="card-body">
            <form action="{{ route('pengeluaranzakatmaal.store') }}" method="POST">
              {{ csrf_field() }}
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light">Total Kas</span>
                  </div>
                  <input type="text" class="form-control" value=" Rp.<?php echo format_uang($kas->jml_kas); ?>" readonly>
                  <input type="hidden" class="form-control" name="jml_kas" value="{{ $kas->jml_kas }}" readonly>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light">Pengeluaran</span>
                  </div>
                  <input type="number" class="form-control" name="jml_peng_zmaal" value="" placeholder="Rp." required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-light">Tanggal Pengeluaran</span>
                  </div>
                  <input type="date" class="form-control" name="tgl_pengeluaran" required>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="keterangan">Keterangan:</label>
                  <textarea class="form-control" rows="5" name="keterangan" required></textarea>
                </div>
                <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
              </div>              
            </form>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <button onclick="deleteAll()" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</button> 
          </div>
          <div class="card-body">
            <div class="table-responsive">
                <form method="post" id="form-pengeluaranzakatmaal">
                  {!! csrf_field() !!}
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="20"><input type="checkbox" value="1" id="select-all"></th>
                    <th>No.</th>
                    <th>Jumlah Pengeluaran</th>
                    <th>Keterangan</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($pengeluaran as $list)
                  <?php $no++; ?>
                  <tr>
                    <td><input type="checkbox" name="id[]" value="{{ $list->id_peng_zmaal }}"></td>
                    <td>{{ $no }}</td>
                    <td>Rp. <?php echo format_uang($list->jml_peng_zmaal); ?></td>
                    <td>{{$list->keterangan}}</td>
                    <td><?php echo tanggal_indonesia($list->created_at); ?></td>
                    <th style="text-align: center;">
                      <a href="{{ URL::to('pengeluaranzakatmaal/invoicezakatmaal/'.$list->id_peng_zmaal) }}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                      <a href="{{ route('pengeluaranzakatmaal.edit', $list->id_peng_zmaal) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    	<a href="{{ URL::to('pengeluaranzakatmaal/destroy/'.$list->id_peng_zmaal) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
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
        url: "pengeluaranzakatmaal/hapus",
        type: "POST",
        data: $('#form-pengeluaranzakatmaal').serialize(),
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