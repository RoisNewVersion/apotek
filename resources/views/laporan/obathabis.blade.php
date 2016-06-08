@extends('layout.default')
@section('content')
<div class="span10">
<p></p>
<div class="widget widget-table table-action">
	<div class="widget-header">
		<i class="icon-list"></i>
		<h3>Daftar obat habis</h3>
	</div>

	<div class="widget-content">

		<table class="table table-striped table-bordered">
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
	</div>
</div> 
</div>
@stop