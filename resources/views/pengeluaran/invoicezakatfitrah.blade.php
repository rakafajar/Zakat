@extends('master-invoice')
@section('content')
<h1>Pengeluaran</h1>
<address contenteditable>
	<p>ZISWAF<br>Zakat Fitrah</p>
</address>
<table class="meta">
	<tr>
		<th><span contenteditable>Invoice #</span></th>
		<td>
			<span contenteditable>{{$pengeluaran->id_peng_zfitrah}}</span>
		</td>
	</tr>
	<tr>
		<th>
			<span contenteditable>Date</span>
		</th>
		<td>
			<span contenteditable>
				<?php
					echo tanggal_indonesia($pengeluaran->created_at);
				?>
			</span>
		</td>
	</tr>
</table>
<table class="inventory">
	<thead>
		<tr>
            <th><span contenteditable>Keterangan</span></th>
            <th><span contenteditable>Keterangan Pengeluaran</span></th>
			<th><span contenteditable>Nominal</span></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<span contenteditable>Pengeluaran</span>
			</td>
			<td>
				<span contenteditable>{{$pengeluaran->keterangan}}</span>
            </td>
            <td>
                <span contenteditable>Rp. <?php echo format_uang($pengeluaran->jml_peng_zfitrah); ?></span>
            </td>
		</tr>
	</tbody>
</table>
<table class="balance">
	<tr>
		<th>
			<span contenteditable>Total</span>
		</th>
		<td>
			<span>Rp. <?php echo format_uang($pengeluaran->jml_peng_zfitrah); ?></span>
		</td>
	</tr>
</table>
@endsection