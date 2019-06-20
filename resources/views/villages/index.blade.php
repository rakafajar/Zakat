@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kelurahan</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="{{ route('kelurahan.create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-user-plus"></i> Tambah
            </a>
           </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>ID Kelurahan</th>
                    <th>ID/Nama Kecamatan</th>
                    <th>Nama Kelurahan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($kelurahan as $list)
                  <?php $no++ ; ?>
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $list->id }}</td>
                    <td>{{ $list->district_id}}</td>
                    <td>{{ $list->name }}</td>
                    <td style="text-align: center;">
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <form action="#" method="post">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!} 
                          <button class="btn btn-danger btn-sm" type="submit"><i class="fas fa-trash-alt"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>


@endsection
