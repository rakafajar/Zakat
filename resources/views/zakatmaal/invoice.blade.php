<!DOCTYPE html>
<html>
<head>
	<title>Invoice Zakat Maal</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>ZISWAF</h1>
	<hr>
    <p>Nama Muzaaki : {{ $zakatmaal->nama_lengkap }}</p>
    <p>Harga Emas : <?php echo "Rp. ".format_uang($zakatmaal->harga_emas) ?></p>
    <p>Jumlah Harta : <?php echo "Rp. ".format_uang($zakatmaal->jml) ?></p>
    <p>Jumlah Nisab : <?php echo "Rp. ".format_uang($zakatmaal->nisab) ?></p>
    <p>Tanggal Pembayaran : <?php echo tanggal_indonesia($zakatmaal->created_at)?></p>
</body>
</html>