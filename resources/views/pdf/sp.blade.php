<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Surat Permintaan</title>
	<link rel="stylesheet" href="">
	<style>
		@media print {
			.cetak{
				display: none;
			}

			@page{
				width: 50%;
				/*height: 120mm;*/
				font-size: small;
			}
			
			/*table th, table td {
			    border: 1px solid black;
			    border-collapse: collapse;
			    font-size: x-small;
			    padding: 1px;
			}*/
			.kopatas
			{
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				/*width: 50%;*/
				font-size: small;
				border: 1px solid black;
				border-collapse: collapse;
			}

			.kopatas th, .kopatas td{
				
				
				
			    padding: 3px;
			    border-outline: 0px;
			}

			.kopatas1
			{
				/*width: 50%;*/
				font-size: small;
			    padding: 3px;
			}

			.kopatas2{
				/*border: 1px solid black;*/
				width: 50%;
				font-size: x-small;
			}

			
		}

		.kopatas th, .kopatas td
		{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			
			border-collapse: collapse;
			font-size: small;
			border: 1px solid black;
		    padding: 8px;
		}

		.kopatas2{
			font-size: small;
		}

		.kopatas1{
			font-size: x-small;
		}

		table{
			width: 50%;
		}
		
	</style>
</head>
<body>
	<button class="cetak" onclick="cetak();">Cetak</button>
	<table class="kopatas1">
		<tr>
			<td rowspan="2">
				<img src="{{asset('img/logo_apotek_2.jpg')}}" height="45" alt="">
			</td>
			<td>GODONG, <?php echo date('d/m/Y') ?></td>
			
		</tr>
		<tr>
			<td>Kepada Yth </td>
		</tr>
		<tr>
			<td>SIPA : 19851122/SIPA_33.15/2014/2045</td>
			<td> ................................</td>
		</tr>
		<tr>
			<td>SIA : 422/811/SIA/2014</td>
			<td> ................................</td>
		</tr>
		<tr>
			<td>HP  : 0856-4000-6184</td>
			<td> ................................</td>
		</tr>
	</table>

	<div style="text-align: center; width: 50%; padding: 3px;">
		<div style=" text-decoration: underline;">SURAT PESANAN</div>
		<div style="">No AB/422/811/<?php echo time() ?></div>
	</div>

	<table class="kopatas">
		<tr>
			<th width="10%">No</th>
			<th>MACAM OBAT</th>
			<th>BANYAKNYA</th>
			<th>KETERANGAN</th>
		</tr>

		<?php $no = 1; ?>
		@foreach($data2 as $data)
		@foreach($data as $d)
			<tr>
				<td width="10%">{{$no}}</td>
				<td>{{$d}}</td>
				<td></td>
				<td></td>
			</tr>
		<?php $no++ ?>
		@endforeach
		@endforeach
		
	</table>

	<table class="kopatas2">
		<tr style="text-align: center;">
			<td>HORMAT KAMI</td>
			<td>PENERIMA</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
		<TR style="text-align: center;">
			<td>NOVITA PRADEVININGSIH, S.Far., Apt.</td>
			<td>...................................</td>
		</TR>
	</table>
	
			
</body>

<script>
	function cetak(){
		window.print();
	}
</script>
</html>