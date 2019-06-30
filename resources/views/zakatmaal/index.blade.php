@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Zakat Maal</li>
</ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <a href="{{ route('zakatmaal.create') }}" class="btn btn-primary btn-sm">
              <i class="fas fa-coins"></i> Bayar Zakat Maal
            </a>
            <a href="/Zakat/public/laporanzakatmaal" class="btn btn-success btn-sm" target="_blank">
              <i class="fas fa-print"></i> Cetak
            </a>
          </div>
          <br>
          <div class="col-sm-6">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-light">Total Kas</span>
                </div>
                @foreach($view_tot_kas_zakat_maal as $list)
                  <input type="text" class="form-control" value="Rp. <?php echo format_uang($list->total_kas_zakat_maal); ?>" disabled>
                @endforeach
              </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>Nama Muzaki</th>
                    <th>Jumlah Harta</th>
                    <th>Harga Emas/gram</th>
                    <th>Nisab/tahun</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 0; ?>
                  @foreach($view_zakat_maal as $list)
                  <?php $no++ ?>
                  <tr>
                    <td>{{ $no }}</td>
                    <td>{{ $list->nama_lengkap }}</td>
                    <td><?php echo "Rp. ".format_uang($list->jml) ?></td>
                    <td><?php echo "Rp. ".format_uang($list->harga_emas) ?></td>
                    <td><?php echo "Rp. ".format_uang($list->nisab) ?></td>
                    <td><?php echo tanggal_indonesia($list->created_at) ?></td>
                    <th style="text-align: center;">
                        <a href="{{ URL::to('zakatmaal/invoice/'.$list->id_zmaal) }}" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                      <a href="{{route('zakatmaal.edit', $list->id_zmaal)}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="{{ URL::to('zakatmaal/destroy/'.$list->id_zmaal) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </th>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection
