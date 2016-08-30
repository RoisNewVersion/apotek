<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Penjualan bulanan</title>
	<link rel="stylesheet" href="">

	<style type="text/css">
		@media print {
			
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

	<img src="{{asset('img/logo_apotek_2.jpg')}}" alt="logo" width="100%" height="85">
	
	Laporan penjualan bulan <?php echo $tglbulanan ?>

	<table class="kopatas">
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

		@foreach(array_chunk($ambil, 100) as $datarow)
			@foreach($datarow as $data)
			<?php 
				$total = $total + $data->total_harga;
				$untung = $untung + $data->untung;
			?>
			<tr>
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
</html>