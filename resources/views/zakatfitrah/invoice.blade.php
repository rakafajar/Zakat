@extends('master-invoice')
@section('content')
<h1>Pembayaran</h1>
<address contenteditable>
	<p>ZISWAF<br>Zakat Fitrah</p>
</address>
<table class="meta">
	<tr>
		<th><span contenteditable>Invoice #</span></th>
		<td>
			<span contenteditable>{{$zakatfitrah->id_zfitrah}}</span>
		</td>
	</tr>
	<tr>
		<th>
			<span contenteditable>Date</span>
		</th>
		<td>
			<span contenteditable>
				<?php
					echo tanggal_indonesia($zakatfitrah->created_at);
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
      <th><span contenteditable>Harga Beras</span></th>
			<th><span contenteditable>Nominal</span></th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				<span contenteditable>Zakat Fitrah</span>
			</td>
			<td>
				<span contenteditable>{{$zakatfitrah->nama_lengkap}}</span>
      </td>
      <td>
          <span contenteditable>Rp. <?php echo format_uang($zakatfitrah->harga_beras); ?></span>
      </td>
			<td>
				<span contenteditable>Rp. <?php echo format_uang($zakatfitrah->nominal); ?></span>
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
			<span>Rp. <?php echo format_uang($zakatfitrah->nominal); ?></span>
		</td>
	</tr>
</table>
@endsection