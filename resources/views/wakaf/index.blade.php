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
          </div>
          <br>
          <div class="col-sm-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-light">Total Kas</span>
              </div>
              @foreach($view_tot_wakaf as $list)
              <input type="text" class="form-control" value="Rp. <?php echo format_uang($list->total_kas_wakaf); ?>" disabled>
              @endforeach
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Pewakaf</th>
                    <th>Jenis Wakaf</th>
                    <th>Nominal Wakaf</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($view_wakaf as $list)
                  <?php $no++ ?>
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{$list->nama_wakaf}}</td>
                    <td>{{$list->jenis_wakaf}}</td>
                    <td>
                        Rp. <?php echo format_uang($list->nominal_wakaf); ?>
                    </td>
                    <th style="text-align: center;">
                      <a href="{{ URL::to('wakaf/invoice/'.$list->id_wakaf) }}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="{{route('wakaf.edit', $list->id_wakaf)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="{{ URL::to('wakaf/destroy/'.$list->id_wakaf) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

@endsection
