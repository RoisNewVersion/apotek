<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Penjualan harian</title>
	<link rel="stylesheet" href="">

	<style type="text/css">
		@media print {
			.cetak{
				display: none;
			}
			
			table th, table td {
			    border: 1px solid black;
			    border-collapse: collapse;
			    font-size: xx-small;
			    padding: 3px;
			}

			.kopatas{
				page-break-after: always;
			}
		}

		.kopatas
		{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			width: 100%;
			border-collapse: collapse;
			font-size: xx-small;
		}

		table, th, td {
		    border: 1px solid black;
		    padding: 4px;
		}

		.altr
		{
			border: 0px;
			border-outline: 0px;
		}
	</style>

</head>
<body>
	<button class="cetak" onclick="cetak();">Cetak</button>
	<img src="{{asset('img/logo_apotek_2.jpg')}}" alt="logo" width="100%" height="85">
	
	Laporan penjualan harian <?php echo date('d-m-Y'); ?>

	<table border="1" class="kopatas" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">
		<tr>
			<th>No.</th>
			<th>Nama Obat</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Total Harga</th>
			<th>Diskon</th>
			<th>Untung</th>
		</tr>

		<?php 
			$no = 1; 
			$total = 0;
			$untung = 0;
		?>

		@foreach($ambil as $data)
			<?php 
				$total = $total + $data->total_harga;
				$untung = $untung + $data->untung;
			?>
			<tr >
				<td><?= $no ?></td>
				<td ><?= $data->nama_obat?></td>
				<td ><?= $data->jumlah?></td>
				<td >Rp <?php echo number_format($data->harga, 0, '', '.')?></td>
				<td >Rp <?php echo number_format($data->total_harga, 0, '', '.') ?></td>
				<td ><?= $data->diskon?> %</td>
				<td >Rp <?php echo number_format($data->untung, 0, '', '.') ?></td>
			</tr>
		<?php $no++; ?>
		@endforeach

		<tr>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td ><b>Total </b></td>
			<td ><b>Rp <?php echo number_format($total, 0, '', '.') ?></b></td>
			<td></td>
			<td ><b>Rp <?php echo number_format($untung, 0, '', '.') ?></b></td>
		</tr>

	</table>
</body>
<script>
	function cetak() {
		window.print();
	}
</script>
</html>