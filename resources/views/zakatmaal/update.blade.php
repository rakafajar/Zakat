@extends('master')
@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="#">Dashboard</a>
	</li>
	<li class="breadcrumb-item active">Zakat Maal</li>
</ol>

<div class="card">
  <div class="card-header">Invoice Zakat Maal</div>
  <div class="card-body">
    <div class="col-md-8">
      {{ $muzakki }}<br>
      {{ $harga_emas }}<br>
      {{ $haul }}
      <a href="" class="btn btn-success btn-sm"><i class="fas fa-print"></i> Cetak</a>
      <a href="{{ route('zakatmaal.index')}}" class="btn btn-danger btn-sm"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
    </div>    
  </div>
</div>
<br>


@endsection
