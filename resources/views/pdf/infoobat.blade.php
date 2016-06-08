<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta content="utf-8" http-equiv="encoding">
	<title>Informasi obat</title>
	<link rel="stylesheet" href="">

	<style type="text/css" media="screen">
		.kop{

		}

		.kopatas
		{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			width: 100%;
			border-collapse: collapse;
			font-size: xx-small;
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

	<table border="1" class="kopatas" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">
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

		@foreach($obatdata as $data)
			<?php 
				$harga_pokok = $harga_pokok + $data->harga_pokok;
				$harga_jual = $harga_jual + $data->harga_jual;
			?>
			<tr style="padding: 4px 4px 4px 4px;">
				<td><?= $no ?></td>
				<td style="padding: 4px ;"><?= $data->nama_obat?></td>
				<td style="padding: 4px ;"><?= $data->golongan1->nama_gol?></td>
				<td style="padding: 4px ;"><?= $data->merk1->nama_merk?></td>
				<td style="padding: 4px ;"><?= $data->rak1->nama_rak?></td>
				<td style="padding: 4px ;"><?= $data->diskon?></td>
				<td style="padding: 4px ;">Rp <?php echo number_format($data->harga_pokok, 0, '', '.')?></td>
				<td style="padding: 4px ;">Rp <?php echo number_format($data->harga_jual, 0, '', '.') ?></td>
				<td style="padding: 4px ;"><?= $data->kadaluarsa?></td>
			</tr>
		<?php $no++; ?>
		@endforeach

		<tr>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td style="padding: 4px ;"><b>Total </b></td>
			<td style="padding: 4px ;"><b>Rp <?php echo number_format($harga_pokok, 0, '', '.') ?></b></td>
			<td style="padding: 4px ;"><b>Rp <?php echo number_format($harga_jual, 0, '', '.') ?></b></td>
			<td class="alt"></td>
		</tr>

	</table>
</body>
</html>