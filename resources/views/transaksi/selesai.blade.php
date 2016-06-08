@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-chart"></i>
		<h3>Icon</h3>
	</div>

	<div class="widget-content">
		<h2>isine neng kene</h2>
		<table class="table table-striped table-bordered">
			<tr>
				<th>No.</th>
				<th>Nama Obat</th>
				<th>Jumlah</th>
				<th>Harga</th>
				<th>Total Harga</th>
				<th>Diskon</th>
			</tr>

			<?php 
				$no = 1; 
				$total = 0;
			?>

			@foreach(Session::get('datatambahobat') as $data)
			<?php 
				$total = $total + $data['total_harga'];
			?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $data->obit->nama_obat?></td>
				<td><?= $data->jumlah?></td>
				<td>Rp <?php echo number_format($data->harga, 0, '', '.')?></td>
				<td>Rp <?php echo number_format($data->total_harga, 0, '', '.') ?></td>
				<td><?= $data->diskon?> %</td>
			</tr>
			<?php $no++; ?>
			@endforeach
		</table>
	</div>
</div> 
@stop