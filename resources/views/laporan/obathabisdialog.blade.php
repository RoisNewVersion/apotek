<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Obat habis cetak</title>
	<link rel="stylesheet" href="">
	<style>
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

			tr{
				page-break-after: avoid;
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
	</style>
</head>
<body>
	<button class="cetak" onclick="cetak();">Cetak</button>
	<div style="font-size: 12px; text-align: center;">Data obat habis (isi <= 3) APOTEK BUGEL <?php echo date('d-M-Y') ?></div>
	<table class="kopatas">
		<?php $no = 1; ?>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Obat</th>
				<th>Merk</th>
				<th>Supplier</th>
				<th>No. Telp Supplier</th>
		</thead>
		<tbody>
			@foreach ($obathabis as $data)
				<tr>
					<td>{!! $no !!}</td>
					<td>{!! $data->nama_obat!!}</td>
					<td>{!! $data->obathabis_merk->nama_merk !!}</td>
					<td>{!! $data->obathabis_supplier->nama_supl !!}</td>
					<td>{!! $data->obathabis_supplier->hp !!}</td>
				</tr>
			<?php $no++ ?>
			@endforeach
			
		</tbody>
	</table>
</body>
<script type="text/javascript">
	function cetak() {
		window.print();
	}
</script>
</html>