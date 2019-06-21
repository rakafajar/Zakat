@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Agama</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <a href="{{ route('agama.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-user-plus"></i> Tambah
    </a>
    </div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
            <th width="10">No</th>
            <th>Nama Agama</th>
            <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach($agama as $list)
            <?php $no++ ?>
            <tr>
            <td>{{ $no }}</td>
            <td>{{ $list->agama }}</td>
            <th style="text-align: center;">
                <a href="{{ route('agama.edit', $list->id_agama )}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                <form action="{{ route('agama.destroy', $list->id_agama)}}" method="POST">
                {!! csrf_field() !!}
                {!! method_field('DELETE') !!}
                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                </form>
            </th>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
    
@endsection