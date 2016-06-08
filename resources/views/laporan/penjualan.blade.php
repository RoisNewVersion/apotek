@extends('layout.default')
@section('content')
<div class="col-md-12">
<h3>Daftar tabel penjualan</h3>
<p></p>
<div class="">

	<div class="">
		<table id="obat" class="table table-bordered table-condensed table-striped">
		    <thead>
		    <tr>
		        <th>Nama Obat</th>
		        <th>jumlah</th>
		        <th>harga</th>
		        <th>total harga</th>
		        <th>diskon</th>
		        <th>untung</th>
		        <th>Aksi</th>
		    </tr>
		    </thead>
		</table>
	</div>
</div> 
</div>

@stop

@section('datatable')
<script>
	$(document).ready(function () {

	var table = $('#obat').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{{ url('laporanpenjualan') }}',
	        columns: [
	            {data: 'obat[].nama_obat', name: 'nama_obat', orderable: false, searchable: false},
	            {data: 'jumlah', name: 'jumlah'},
	            {data: 'harga', name: 'harga'},
	            {data: 'total_harga', name: 'total_harga'},
	            {data: 'diskon', name: 'diskon'},
	            {data: 'untung', name: 'untung'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],

	    });

	 });

</script>
@stop
