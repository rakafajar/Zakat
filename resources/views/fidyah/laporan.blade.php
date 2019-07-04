<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<center>
		<h1>ZISWAF</h1>
	</center>
	<hr>
	<h3>Laporan Fidyah</h3>
	<table class='table table-bordered' border="1px">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Nominal</th>
				<th>Tanggal Bayar</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($fidyah as $p)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$p->nama_lengkap}}</td>
				<td>{{$p->nominal_fidyah}}</td>
				<td>
					<?php
						echo tanggal_indonesia($p->created_at);
					?>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	@foreach($view_tot_fidyah as $list)
		<p align="left">Total : Rp. <?php echo format_uang($list->total_kas_fidyah); ?></p>
	@endforeach

</body>
</html>