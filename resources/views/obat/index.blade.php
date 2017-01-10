@extends('layout.default')
@section('content')
<div class="col-md-12">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("obat.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<p></p>
<div class="" style="padding-left: 30px;">

	<div class="">
		<table id="obat" class="table table-bordered table-condensed table-striped">
		    <thead>
		    <tr>
		        <th>Nama</th>
		        <th>Barcode</th>
		        <th>Satuan</th>
		        <th>Isi</th>
		        <th>Hrg. Pokok</th>
		        <th>Hrg. Jual</th>
		        {{-- <th>Diskon</th> --}}
		        <th>Rak</th>
		        <th>Golongan</th>
		        <th>Merk</th>
		        <th>Supplier</th>
		        <th>Tgl. Kadaluarsa</th>
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
	        ajax: '{{ url('dtobat') }}',
	        cache: true,
	        columns: [
	            {data: 'nama_obat', name: 'nama_obat'},
	            {data: 'barcode', name: 'barcode', orderable: false, searchable: false},
	            {data: 'nama_satuan', name: 'nama_satuan', orderable: false, searchable: false},
	            {data: 'isi', name: 'isi', orderable: false, searchable: false},
	            {data: 'harga_pokok', name: 'harga_pokok', orderable: false, searchable: false},
	            {data: 'harga_jual', name: 'harga_jual', orderable: false, searchable: false},
	            
	            {data: 'nama_rak', name: 'nama_rak', orderable: false, searchable: false},
	            {data: 'nama_gol', name: 'nama_gol', orderable: false, searchable: false},
	            {data: 'nama_merk', name: 'nama_merk', orderable: false, searchable: false},
	            {data: 'nama_supl', name: 'nama_supl', orderable: false, searchable: false},
	            {data: 'kadaluarsa', name: 'kadaluarsa'},
	            {data: 'action', name: 'action', orderable: false, searchable: false}
	        ],

	    });

	 });

</script>
@stop
