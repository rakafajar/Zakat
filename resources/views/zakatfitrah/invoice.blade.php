<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <p>Nama Muzaaki : {{ $zakatfitrah->nama_lengkap }}</p>
    <p>Harga Beras : 
      <?php echo "Rp. ".format_uang($zakatfitrah->harga_beras) ?>
    </p>
    <p>Nominal Pembayaran : 
      <?php echo "Rp. ".format_uang($zakatfitrah->nominal) ?>
    </p>
    <p> Tanggal Pembayaran : 
        <?php
          echo tanggal_indonesia($zakatfitrah->created_at);
        ?>
    </p>


</body>
</html>