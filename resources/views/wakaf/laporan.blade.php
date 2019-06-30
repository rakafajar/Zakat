<!DOCTYPE html>
<html>
<head>
	<title>Laporan Wakaf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<<center>
		<h1>ZISWAF</h1>
	</center>
	<hr>
	<h3>Laporan Wakaf</h3>
	<table class='table table-bordered' border="1px">
		<thead>
			<tr>
				<th>No</th>
                <th>Nama Pewakaf</th>
                <th>Jenis Wakaf</th>
				<th>Nominal Wakaf</th>
				<th>Tanggal Pembayaran</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($wakaf as $list)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{$list->nama_wakaf}}</td>
				<td>{{$list->jenis_wakaf}}</td>
				<td>{{$list->nominal_wakaf}}</td>
				<td>
					<?php
					  echo tanggal_indonesia($list->created_at);
					?>
				  </td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<hr>
	@foreach($view_tot_wakaf as $list)
	<p align="left">Total : Rp. <?php echo format_uang($list->total_kas_wakaf); ?></p>
	@endforeach

</body>
</html>