@extends('master-invoice')
@section('content')
<h1>Pembayaran</h1>
<address contenteditable>
	<p>ZISWAF<br>Wakaf</p>
</address>
<table class="meta">
	<tr>
		<th><span contenteditable>Invoice #</span></th>
		<td>
			<span contenteditable>{{$wakaf->id_wakaf}}</span>
		</td>
	</tr>
	<tr>
		<th>
			<span contenteditable>Date</span>
		</th>
		<td>
			<span contenteditable>
				<?php
					echo tanggal_indonesia($wakaf->created_at);
				?>
			</span>
		</td>
	</tr>
</table>
<table class="inventory">
	<thead>
		<tr>
			<th><span contenteditable>Pembayaran</span></th>
			<th><span contenteditable>Nama</span></th>
			<th><span contenteditable>Jenis Wakaf</span></th>
			<th><span contenteditable>Nominal</span></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<span contenteditable>Wakaf</span>
			</td>
			<td>
				<span contenteditable>{{$wakaf->nama_lengkap}}</span>
			</td>
			<td>
				<span contenteditable>{{$wakaf->jenis_wakaf}}</span>
			</td>
			<td>
				<span contenteditable>Rp. <?php echo format_uang($wakaf->nominal_wakaf); ?></span>
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
			<span>Rp. <?php echo format_uang($wakaf->nominal_wakaf); ?></span>
		</td>
	</tr>
</table>
@endsection