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
           </div>
          <br>
          <div class="col-sm-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text bg-light">Total Kas</span>
              </div>
              @foreach($view_tot_insha as $list)
              <input type="text" class="form-control" value="Rp. {{ $list->total_kas_insha }}" disabled>
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
                  @foreach($insha as $list)
                  <?php $no++; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $list->nama_insha }}</td>
                    <td>{{ $list->nominal_insha }}</td>
                    <th style="text-align: center;">
                    	<a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                    	<a href="{{ route('infaqshadaqah.edit', $list->id_insha) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    	<a href="{{ URL::to('infaqshadaqah/destroy/'.$list->id_insha) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>


@endsection
