@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Pengeluaran Infaq & Shodaqoh</li>
</ol>
        
        <div class="card mb-3">
          <div class="card-header">
            Form Pengeluaran Infaq & Shodaqoh
          </div>
          <div class="card-body">
            <form action="{{ route('pengeluaraninsha.store') }}" method="POST">
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
                  <input type="number" class="form-control" name="jml_peng_insha" value="" placeholder="Rp.">
                </div>
                <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
              </div>              
            </form>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
          	Data Pengeluaran Infaq & Shodaqoh
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jumlah Pengeluaran</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($pengeluaran as $list)
                  <?php $no++; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>
                        Rp. <?php echo format_uang($list->jml_peng_insha); ?>
                    <td>
                        <?php echo tanggal_indonesia($list->created_at); ?>
                    <th style="text-align: center;">
                      <a href="" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                    	<a href="{{ URL::to('pengeluaraninsha/destroy/'.$list->id_peng_insha) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>


@endsection
