<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Nota</title>
	<link rel="stylesheet" href="">
	<style>
		@media print {
			html, body{
				/*width: 58mm;
				height: 150mm;
				margin-right: -3px;
				margin-top: 3px;
				margin-bottom: 3px;
				font-size: x-small;*/
			}
			@page{
				width: 58mm;
				height: 120mm;
				margin-top: 3px;
				margin-bottom: 3px; 
				font-size: x-small;
			}
			
			table th, table td {
			    border: 1px solid black;
			    border-collapse: collapse;
			    font-size: x-small;
			    padding: 1px;
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
		    padding: 3px;
		}
	</style>
</head>
<body>

	<div style="font-size: 7; text-align: center;">
		<b>APOTEK BUGEL</b>
		<br>
	</div>

	<table class="kopatas">
		<tr>
			<th>Nama</th>
			<th>Jml</th>
			<th>Hrg</th>
			<th>T. Hrg</th>
			<th>Disk.</th>
			<th>Id-Tr</th>
		</tr>

		<?php 
			// $no = 1; 
			$total = 0;
		?>

		@foreach($html as $data)
			<?php 
				$total = $total + $data['total_harga'];
			?>
			<tr>
				<td ><?= substr($data->obit->nama_obat, 0, 10)?></td>
				<td ><?= $data->jumlah?></td>
				<td > <?php echo number_format($data->harga, 0, '', '.')?></td>
				<td > <?php echo number_format($data->total_harga, 0, '', '.') ?></td>
				<td ><?= $data->diskon?>%</td>
				<td><?= $data->id ?></td>
			</tr>
		<?php ?>
		@endforeach

		<tr>
			<td class="alt"></td>
			<td class="alt"></td>
			<td class="alt"></td>
			<td ><b>Total </b></td>
			<td ><b><?php echo number_format($total, 0, '', '.') ?></b></td>
			<td></td>
		</tr>

	</table>
	<div style="font-size: 7">
		Tgl : <?php echo date('d-m-Y'); ?>
		<br><br>
		<b>TERIMA KASIH</b>

	</div>
</body>
</html>