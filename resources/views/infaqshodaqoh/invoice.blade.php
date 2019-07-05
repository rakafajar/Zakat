<!DOCTYPE html>
<html>
<head>
	<title>Invoice Infaq & Shodaqoh</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>
<body>
	<h1>ZISWAF</h1>
	<hr>
	<h3>Invoice Infaq & Shodaqoh</h3>
	<p>Nama Penginfaq : {{$insha->nama_lengkap}}</p>
	<p>Shodaqoh & Infaq yang Dibayar : <?php echo "Rp. ".format_uang($insha->nominal_insha);?></p>
	<p> Tanggal Bayar : <?php echo tanggal_indonesia($insha->created_at); ?></p>


</body>
</html>