<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Khas Zakat Fitrah</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
                <th width="10">No</th>
                <th>Nama Muzaki</th>
                <th>Jumlah Harta</th>
                <th>Harga Emas/gram</th>
                <th>Nisab/tahun</th>
                <th>Tanggal Pembayaran</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($view_zakat_maal as $list)
			<tr>
                    <td>{{ $no }}</td>
                    <td>{{ $list->nama_lengkap }}</td>
                    <td><?php echo "Rp. ".format_uang($list->jml) ?></td>
                    <td><?php echo "Rp. ".format_uang($list->harga_emas) ?></td>
                    <td><?php echo "Rp. ".format_uang($list->nisab) ?></td>
                    <td><?php echo tanggal_indonesia($list->created_at) ?></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@foreach($view_tot_kas_zakat_maal as $list)
	    <p align="right">Total : Rp. <?php echo format_uang($list->total_kas_zakat_maal); ?></p>
	@endforeach

</body>
</html>