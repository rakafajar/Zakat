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
				<th>No</th>
                <th>Nomor KK</th>
                <th>Nomor NIK</th>
                <th>Nama Pemberi Zakat Fitrah</th>
				<th>Nominal</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($zakatfitrah as $list)
			<tr>
                <td>{{ $i++ }}</td>
                <td>{{$list->no_kk}}</td>
                <td>{{$list->nik}}</td>
				<td>{{$list->nama_lengkap}}</td>
				<td>{{$list->nominal}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@foreach($view_tot_zakat_fitrah as $list)
	    <p align="right">Total : Rp. <?php echo format_uang($list->total_kas_zakat_fitrah); ?></p>
	@endforeach

</body>
</html>