@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Kartu Keluarga</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
          	<a href="{{ route('kartukeluarga.create') }}" class="btn btn-primary btn-sm">
          		<i class="fas fa-user-plus"></i> Tambah
          	</a>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>Nomor KK</th>
                    <th>Alamat</th>
                    <th>RT / RW</th>
                    <th>Kode Pos</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Kecamatan</th>
                    <th>Desa</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($kartukeluarga as $list)
                  <?php $no++ ; ?>
                  <tr>
                    <td>{{ $no}} </td>
                    <td width="10">{{ $list->no_kk }}</td>
                    <td width="10">{{ $list->alamat}}</td>
                    <td width="85">{{ $list->rt }} / {{ $list->rw }}</td>
                    <td width="10">{{ $list->kode_pos}}</td>
                    <td>{{ $list->name_provinces }}</td>
                    <td>{{ $list->name_cities }}</td>
                    <td>{{ $list->name_district }}</td>
                    <td>{{ $list->name_villages }}</td>
                    <th style="text-align: center;">
                    	<a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                    	<a href="{!! route('kartukeluarga.edit', [$list->id_kk]) !!}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <form action="{!! route('kartukeluarga.destroy', [$list->id_kk]) !!}" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!} 
                          <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
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
