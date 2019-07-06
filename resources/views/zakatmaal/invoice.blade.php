@extends('master-invoice')
@section('content')
<h1>Pembayaran</h1>
<address contenteditable>
	<p>ZISWAF<br>Zakat Maal</p>
</address>
<table class="meta">
	<tr>
		<th><span contenteditable>Invoice #</span></th>
		<td>
			<span contenteditable>{{$zakatmaal->id_zmaal}}</span>
		</td>
	</tr>
	<tr>
		<th>
			<span contenteditable>Date</span>
		</th>
		<td>
			<span contenteditable>
				<?php
					echo tanggal_indonesia($zakatmaal->created_at);
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
            <th><span contenteditable>Harga Emas</span></th>
            <th><span contenteditable>Jumlah Harta</span></th>
            <th><span contenteditable>Jumlah Nisab</span></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<span contenteditable>Zakat Maal</span>
			</td>
			<td>
				<span contenteditable>{{$zakatmaal->nama_lengkap}}</span>
            </td>
            <td>
                <span contenteditable>Rp. <?php echo format_uang($zakatmaal->harga_emas); ?></span>
            </td>
			<td>
				<span contenteditable>Rp.<?php echo format_uang($zakatmaal->jml); ?></span>
            </td>
            <td>
                    <span contenteditable>Rp. <?php echo format_uang($zakatmaal->nisab); ?></span>
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
			<span>Rp. <?php echo format_uang($zakatmaal->nisab); ?></span>
		</td>
	</tr>
</table>
@endsection