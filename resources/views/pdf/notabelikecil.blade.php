<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Nota</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		.kopatas
		{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			/*border-collapse: collapse;*/
			font-size: small;
		}
	</style>
</head>
<body>

	<div style="font-size: 9">
		<b>APOTEK BUGEL</b>
		<br>
	</div>

	<table width="30%" class="kopatas" border="0" style="font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;">
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Jml</th>
			<th>Hrg</th>
			<th>T. Hrg</th>
			<th>Disk.</th>
			<th>Id-Tr</th>
		</tr>

		<?php 
			$no = 1; 
			$total = 0;
		?>

		@foreach($html as $data)
			<?php 
				$total = $total + $data['total_harga'];
			?>
			<tr style="padding: 4px 4px 4px 4px;">
				<td><?= $no ?></td>
				<td style="padding: 4px ;"><?= $data->obit->nama_obat?></td>
				<td style="padding: 4px ;"><?= $data->jumlah?></td>
				<td style="padding: 4px ;"> <?php echo number_format($data->harga, 0, '', '.')?></td>
				<td style="padding: 4px ;"> <?php echo number_format($data->total_harga, 0, '', '.') ?></td>
				<td style="padding: 4px ;"><?= $data->diskon?>%</td>
				<td><?= $data->id ?></td>
			</tr>
		<?php $no++; ?>
		@endforeach

		<tr>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td style="padding: 4px ;"><b>Total </b></td>
			<td style="padding: 4px ;"><b><?php echo number_format($total, 0, '', '.') ?></b></td>
			<td></td>
		</tr>

	</table>
	<div style="font-size: 8">
		Tgl : <?php echo date('d-m-Y'); ?>
		<br><br>
		<b>TERIMA KASIH</b>

	</div>
</body>
</html>