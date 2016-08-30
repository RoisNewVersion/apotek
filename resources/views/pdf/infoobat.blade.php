<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta content="utf-8" http-equiv="encoding">
	<title>Informasi obat</title>
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

	{{-- <img src="img/logo_apotek_2.jpg" alt="logo" width="100%" height="85"> --}}
	
	Laporan informasi obat apotek bugel

	<table class="kopatas">
		<tr>
			<th>No.</th>
			<th>Nama Obat</th>
			<th>Golongan</th>
			<th>Merk</th>
			<th>Rak</th>
			<th>Diskon</th>
			<th>Harga pokok</th>
			<th>Harga jual</th>
			<th>Kadaluarsa</th>
		</tr>

		<?php 
			$no = 1; 
			$harga_pokok = 0;
			$harga_jual = 0;
		?>

		@foreach($obatdata->chunk(100) as $datarow)
			@foreach($datarow as $data)
			<?php 
				// dd($data);
				// die();
				$harga_pokok = $harga_pokok + $data->harga_pokok;
				$harga_jual = $harga_jual + $data->harga_jual;
			?>
			<tr >
				<td><?= $no ?></td>
				<td ><?= $data->nama_obat?></td>
				<td ><?= $data->golongan1->nama_gol?></td>
				<td ><?= $data->merk1->nama_merk?></td>
				<td ><?= $data->rak1->nama_rak?></td>
				<td ><?= $data->diskon?></td>
				<td >Rp <?php echo number_format($data->harga_pokok, 0, '', '.')?></td>
				<td >Rp <?php echo number_format($data->harga_jual, 0, '', '.') ?></td>
				<td ><?= $data->kadaluarsa?></td>
			</tr>
		<?php $no++; ?>
			@endforeach
		@endforeach

		<tr>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td ><b>Total </b></td>
			<td ><b>Rp <?php echo number_format($harga_pokok, 0, '', '.') ?></b></td>
			<td ><b>Rp <?php echo number_format($harga_jual, 0, '', '.') ?></b></td>
			<td class="alt"></td>
		</tr>

	</table>
</body>
</html>