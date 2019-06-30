<!DOCTYPE html>
<html>
<head>
	<title>Invoice Fidyah</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h1>ZISWAF</h1>
	<hr>
	<h3>Invoice Fidyah</h3>
	<p align="left">Nama Lengkap : {{$fidyah->nama_fidyah}}</p>
	<p align="left">Fidyah yang Dibayar : {{$fidyah->nominal_fidyah}}</p>
	<p>
		<?php
			echo tanggal_indonesia($fidyah->created_at);
		?>
	</p>


</body>
</html>