<!DOCTYPE html>
<html>
<head>
    <title>Invoice Zkat Fitrah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>ZISWAF</h1>
    <hr>
    <p  align="left">Nama Muzaaki : {{ $zakatfitrah->nama_lengkap }}</p>
    <p align="left">Harga Beras : 
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