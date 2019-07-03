@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">User</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm">
          	  <i class="fas fa-user-plus"></i> Tambah
            </a>
          </div>

          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no = 0; ?>
                @foreach($user as $list)
                <?php $no++ ?>
                <tr>
                    <td>{{$no}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->email}}</td>
                    <th style="text-align: center;">
                      <a href="{{ URL::to('user/destroy/'.$list->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </th>
                </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>

@endsection
