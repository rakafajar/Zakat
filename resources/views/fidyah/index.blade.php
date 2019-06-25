@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Fidyah</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="{{ route('fidyah.create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-coins"></i> Bayar Fidyah
            </a>
            <a href="/fidyah/cetak_pdf" class="btn btn-primary btn-sm" target="_blank">
              <i class="fas fa-print"></i> Bayar Fidyah
            </a>            
          </div>
          <br>
          <div class="col-sm-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-light">Total Kas</span>
              </div>
              @foreach($view_tot_fidyah as $list)
              <input type="text" class="form-control" value="Rp. <?php echo format_uang($list->total_kas_fidyah); ?>" disabled>
              @endforeach
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Nominal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($fidyah as $list)
                  <?php $no++; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $list->nama_fidyah }}</td>
                    <td>
                      <?php echo format_uang($list->nominal_fidyah); ?>
                    </td>
                    <th style="text-align: center;">
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="{{ route('fidyah.edit', $list->id_fidyah) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="{{ URL::to('fidyah/destroy/'.$list->id_fidyah) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>


@endsection
