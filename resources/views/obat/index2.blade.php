@extends('layout.default')
@section('content')
<div class="col-md-12">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("obat.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<p></p>
<div class="">

	<div class="">
		<table id="obat" class="table table-bordered table-condensed table-striped">
		    <thead>
		    <tr>
		        <th>Nama</th>
		        <th>Satuan</th>
		        <th>Isi</th>
		        <th>Hrg. Pokok</th>
		        <th>Hrg. Jual</th>
		        <th>Diskon</th>
		        <th>Rak</th>
		        <th>Golongan</th>
		        <th>Supplier</th>
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
       
    var template = Handlebars.compile($("#details-template").html());

	var table = $('#obat').DataTable({
	        processing : true,
	        serverSide: true,
	        ajax: '{{ url('dtobat') }}',
	        columns: [
	        	{
	        		"className": 'details-control',
	        		"orderable": false,
	        		"data": null,
	        		"defaultContent": ''
	        	},
	            {data: 'nama_obat', name: 'nama_obat'},
	            {data: 'satuan[].nama_satuan', name: 'nama_satuan', orderable: false, searchable: false},
	            {data: 'isi', name: 'isi'},
	            {data: 'harga_pokok', name: 'harga_pokok'},
	            {data: 'harga_jual', name: 'harga_jual'},
	            {data: 'diskon', name: 'diskon'},
	            {data: 'rak[].nama_rak', name: 'nama_rak', orderable: false, searchable: false},
	            {data: 'golongan[].nama_gol', name: 'nama_gol', orderable: false, searchable: false},
	            {data: 'supplier[].nama_supl', name: 'nama_supl', orderable: false, searchable: false},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],
	        order: [[1, 'asc']]
	    });

		// Add event listener for opening and closing details
		    $('#users-table tbody').on('click', 'td.details-control', function () {
		        var tr = $(this).closest('tr');
		        var row = table.row( tr );

		        if ( row.child.isShown() ) {
		            // This row is already open - close it
		            row.child.hide();
		            tr.removeClass('shown');
		        }
		        else {
		            // Open this row
		            row.child( template(row.data()) ).show();
		            tr.addClass('shown');
		        }
		    });

	 });

</script>

<script id="details-template" type="text/x-handlebars-template">
    <table class="table">
        <tr>
            <td>Barcode:</td>
            <td>{{ 'barcode' }}</td>
        </tr>
        <tr>
            <td>Status:</td>
            <td>{{'status'}}</td>
        </tr>
        <tr>
            <td>Kadaluarsa:</td>
            <td>{{'kadaluarsa'}}</td>
        </tr>
    </table>
</script>
@stop
