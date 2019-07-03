@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Hubungan Keluarga</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <a href="{{ route('hubungankeluarga.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah
    </a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="10">No</th>
            <th>Hubungan Keluarga</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach($hub_keluarga as $list)
            <?php $no++ ?>
            <tr>
            <td>{{ $no }}</td>
            <td>{{ $list->nama_hubkeluarga }}</td>
            <th style="text-align: center;">
                <a href="{{ route('hubungankeluarga.edit', $list->id_hubkeluarga) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <a href="{{ URL::to('hubungankeluarga/destroy/'.$list->id_hubkeluarga) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
            </th>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div> 
@endsection