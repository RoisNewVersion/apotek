@extends('layout.default')
@section('content')
<div style="font-size: 18px;">Data obat habis (isi <= 3) </div>
<button id="cetakhabis" onclick="cetakHabis();" type="button" class="btn btn-success">Cetak</button>
<div class="span12">
<p></p>
<div class="">

	<div class="">

		<table id="obathabis" class="table table-striped table-bordered">
			<?php $no = 1; ?>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Obat</th>
					<th>isi</th>
					<th>Satuan</th>
					<th>Merk</th>
					<th>Supplier</th>
					<th>No. Telp Supplier</th>
			</thead>
			<tbody>
				@foreach ($obathabis as $data)
					<tr>
						<td>{!! $no !!}</td>
						<td>{!! $data->nama_obat!!}</td>
						<td>{!! $data->isi!!}</td>
						<td>{!! $data->satuan1->nama_satuan !!}</td>
						<td>{!! $data->obathabis_merk->nama_merk !!}</td>
						<td>{!! $data->obathabis_supplier->nama_supl !!}</td>
						<td>{!! $data->obathabis_supplier->hp !!}</td>
					</tr>
				<?php $no++ ?>
				@endforeach
				
			</tbody>
		</table>
	</div>
</div> 
</div>
@stop

@section('datatable')
	<script>
		$(document).ready(function() {
			$('#obathabis').DataTable();
		});

		// show cetak obat dialog
		function cetakHabis()
		{
			var left = (screen.width/2) - (800/2);
			var right = (screen.height/2) - (640/2);

			var url = '{{url('laporan/obathabis', ['aksi'=>'dialog'])}}';

			window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
		}
	</script>
@stop