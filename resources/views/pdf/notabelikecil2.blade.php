<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Nota beli obat</title>
	<link rel="stylesheet" href="">
	<style>
		@media print{
			.cetak{
				display: none;
			}
			@page{
				width: 50%;
			}

			html, body{
				font-size: xx-small;
				font-family: 'Open Sans Condensed', sans-serif;
			}
			.isi{
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			}

		}
		html, body{
			font-size: small;
		}
	</style>
</head>
<body>
	<button onclick="cetak()" class="cetak" style="align: center;">Cetak</button>
	<br>
	<b>APOTEK BUGEL</b><br>
	Jln. A. Yani 39, Ds Bugel
	<br>
	HP. 085640006184
	<br>
	<br>
	Kasir: {{Auth::user()->name}}
	<br>
	----------------------------------------
	<br>
	<div class="isi">
	<?php 
		// $no = 1; 
		$total = 0;
	?>
	@foreach($html as $data)
			<?php 
				$total = $total + $data['total_harga'];
			?>
				<?= $data->jumlah?>
				<?= substr($data->obit->nama_obat, 0, 10)?>
				
				<?php echo number_format($data->harga, 0, '', '.')?>
				<?php echo number_format($data->total_harga, 0, '', '.') ?>
				<?= $data->diskon?>%
			<?= $data->id ?>
			<br>
		<?php ?>
		@endforeach
	</div>
		----------------------------------------
		<br>
			<b>Total : </b>
			<b><?php echo number_format($total, 0, '', '.') ?></b>
		<br>
		<br>
		<?php echo date('d-m-Y - H:i:s') ?>
		<br>
		Terima kasih
</body>
<script>
	function cetak() {
		window.print();
	}
</script>
</html>