<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Penjualan harian</title>
	<link rel="stylesheet" href="">

	<style type="text/css" media="screen">
		.kop{

		}

		.kopatas
		{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			width: 100%;
			border-collapse: collapse;
		}

		.altr
		{
			border: 0px;
			border-outline: 0px;
		}
	</style>

</head>
<body>

	{{-- <table border="0" align="center" style="text-align: center">
		<tr>
			<td rowspan="3"><img height="60" width="60" src="img/logo-ubl.jpg" alt="Loading"/></td>
			<td style="font-size: 22px">APOTEK SEDERHANA</td>
		</tr>
		<tr>
			<td style="font-size: 18px">Jl. Sembarang, gang buntu no. 23</td>
		</tr>
		<tr>
			<td style="font-size: 14px">Telp. 08985716073</td>
		</tr>
	</table> --}}
	<img src="img/logo_apotek_2.jpg" alt="logo" width="100%" height="85">
	
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
			<tr style="padding: 4px 4px 4px 4px;">
				<td><?= $no ?></td>
				<td style="padding: 4px ;"><?= $data->nama_obat?></td>
				<td style="padding: 4px ;"><?= $data->jumlah?></td>
				<td style="padding: 4px ;">Rp <?php echo number_format($data->harga, 0, '', '.')?></td>
				<td style="padding: 4px ;">Rp <?php echo number_format($data->total_harga, 0, '', '.') ?></td>
				<td style="padding: 4px ;"><?= $data->diskon?> %</td>
				<td style="padding: 4px ;">Rp <?php echo number_format($data->untung, 0, '', '.') ?></td>
			</tr>
		<?php $no++; ?>
		@endforeach

		<tr>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td style="padding: 4px ;"><b>Total </b></td>
			<td style="padding: 4px ;"><b>Rp <?php echo number_format($total, 0, '', '.') ?></b></td>
			<td></td>
			<td style="padding: 4px ;"><b>Rp <?php echo number_format($untung, 0, '', '.') ?></b></td>
		</tr>

	</table>
</body>
</html>