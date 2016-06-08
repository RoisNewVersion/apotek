@extends('layout.default')
@section('content')
<div class="col-md-12">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("hutangsupplier.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<h3>Daftar hutang supplier / PBF</h3>
<p></p>
<div class="">

	<div class="">
		<table id="hutang" class="table table-bordered table-condensed table-striped">
		    <thead>
		    <tr>
		        <th>No Faktur</th>
		        <th>Supplier</th>
		        <th>TGl. datang</th>
		        <th>Jatuh Tempo</th>
		        <th>jml hutang</th>
		        <th>status</th>
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

	var table = $('#hutang').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{{ url('gethutangsupplier') }}',
	        columns: [
	            {data: 'no_faktur', name: 'no_faktur'},
	            {data: 'supplier.nama_supl', name: 'nama_supl'},
	            {data: 'tgl_datang', name: 'tgl_datang'},
	            {data: 'tempo', name: 'tempo'},
	            {data: 'jml_hutang', name: 'jml_hutang'},
	            {data: 'status', name: 'status'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],

	    });

	 });

</script>
@stop
