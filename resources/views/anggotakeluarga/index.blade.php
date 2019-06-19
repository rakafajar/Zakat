@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Anggota Keluarga</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
          	<a href="{{ route('anggotakeluarga.create') }}" class="btn btn-primary btn-sm">
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
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Agama</th>
                    <th>Pendidikan</th>
                    <th>Pekerjaan</th>
                    <th>Status Kawin</th>
                    <th>Hubungan Keluarga</th>
                    <th>Kewarga Negara</th>
                    <th>Paspor</th>
                    <th>Kitap</th>
                    <th>Ayah</th>
                    <th>Ibu</th>
                    <th>Provinsi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($anggotakeluarga as $list)
                  <?php $no++ ; ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{$list->no_kk}}</td>
                    <td>{{$list->nik}}</td>
                    <td>{{$list->nama}}</td>
                    <td>{{$list->tempat_lahir}}</td>
                    <td>
                      <?php echo tanggal_indonesia($list->tanggal_lahir); ?>
                    </td>
                    <td>{{$list->agama}}</td>
                    <td>{{$list->pendidikan}}</td>
                    <td>{{$list->pekerjaan}}</td>
                    <td>{{$list->status_kawin}}</td>
                    <td>{{$list->hubungan_keluarga}}</td>
                    <td>{{$list->kewarga}}</td>
                    <td>{{$list->no_paspor}}</td>
                    <td>{{$list->no_kitap}}</td>
                    <td>{{$list->nama_ayah}}</td>
                    <td>{{$list->nama_ibu}}</td>
                    <td>{{$list->id_provinces}}</td>

                    <th style="text-align: center;">
                      <a href="" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a>
                      <a href="{!! route('anggotakeluarga.edit', [$list->id_anggotakk]) !!}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <form action="{!! route('anggotakeluarga.destroy', [$list->id_anggotakk]) !!}" method="post">
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
