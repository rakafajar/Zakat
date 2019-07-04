<!DOCTYPE html>
<html>
<head>
	<title>Invoice Wakaf</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h1>ZISWAF</h1>
	<hr>
	<p align="left">Nama Lengkap : {{$wakaf->nama_lengkap}}</p>
	<p align="left">Nominal Wakaf :
			<?php echo "Rp. ".format_uang($wakaf->nominal_wakaf) ?>
	<p> Jenis Wakaf : {{$wakaf->jenis_wakaf}}</p>
	<p> Tanggal Pembayaran :                       
		<?php
			echo tanggal_indonesia($wakaf->created_at);
		?>
	</p>
</body>
</html>