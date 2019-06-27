@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Zakat Fitrah</li>
</ol>

<div class="card">
  <div class="card-header">Invoice Zakat Fitrah</div>
  <div class="card-body">
    <div class="col-md-8">
      <p><strong>Harga Beras : Rp. <?php echo format_uang($harga_beras) ?></strong></p>
      <p><strong>Total yang harus dibayar : Rp. <?php echo format_uang($nominal) ?></strong></p>
      <a href="" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak</a>
      <a href="{{ route('zakatfitrah.index')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>    
  </div>
</div>
<br>


@endsection
