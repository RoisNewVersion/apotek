@extends('layout.default')
@section('content')
<div class="col-md-12">
<p></p>
<div class="">

	<div class="">
		<table id="pembelianobat" class="table table-bordered table-condensed table-striped">
			<thead>
				<tr>
					<th>ID obat</th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga</th>
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

				$('#pembelianobat').DataTable({
        			processing: true,
        			serverSide: true,
        			ajax: '{{ url('getobatbeli') }}',
        			columns: [
	        			{data: 'idobat', name: 'idobat'},
	        			{data: 'jenis', name: 'jenis'},
	        			{data: 'nama', name: 'nama'},
	        			{data: 'jumlah', name: 'jumlah'},
	        			{data: 'harga', name: 'harga'},
        			]
        		});

	 });

</script>
@stop
