@extends('layout.default')
@section('content')
<div class="col-md-6">
<h3 style="text-decoration: underline;">Pembuatan Surat Permintaan</h3>
<p></p>
<div class="">
<h3>Cari Nama Obat</h3>
<input type="text" name="cariobat" id="cariobat" value="" placeholder="Cari">

	<div class="">
		<h2>Daftar obat</h2>
		<table class="table" id="lappenjualan">
		    <thead>
		    <tr>
		        <th>Nama Obat</th>
		        <th>jumlah</th>
		        <th>Ket</th>
		        <th>Aksi</th>
		    </tr>
		    </thead>
		</table>

		<button style="display: none; margin-bottom: 20px;" id="sp_finish" class="btn btn-info btn-sm">Finish</button>
	</div>
</div> 
</div>

@stop

@section('datatable')

<script>
	$(document).ready(function() {
		// data tabel
		dt = $('#lappenjualan').DataTable({
			"drawCallback": function(set){
				var tab = this.api();
				if (tab.page.info().recordsTotal > 0 ) {
			    	$('#sp_finish').show();
			    }
			}
		});
	});

	// hapus data di tabel
	$('#lappenjualan').on('click', '.btn', function(event) {
		event.preventDefault();
		dt.row($(this).parents('tr')).remove().draw();
	});
	
	$("#cariobat").autocomplete({
 		source: '{!! url("getnamaobat") !!}',
 		minLenght: 3,
 		select: function(event, ui){
 			dt.row.add([
 				'<input type="hidden" name="namaobat[]" value="'+ui.item.nama+'">'+ui.item.nama, '', '', '<button type="button" class="btn btn-xs btn-danger">Hapus</button>'
 				]).draw();
 			// kosongkan lg inputnya
 			$('#cariobat').val('');
 		}
 	});

 	// klik finish sp
 	$('#sp_finish').click(function(event) {
 		// ambil inputan nama obat
 		var namaobat = $('input[name="namaobat[]"]').map(function() {
 			return this.value;
 		}).get();

 		var url = '{{route("hasilsp")}}';

 		$.post('{{route('postsp')}}', {data: namaobat}, function(data, textStatus, xhr) {
 		}).done(function(argument) {
 			// console.log(argument);
 			openWindow(url);
 		}).fail(function(argument){
 			console.log('sp gagal');
 			alert('surat permintaan gagal');
 		});
 		
 	});

 	// open window
 	function openWindow(url)
 	{
		var left = (screen.width/2) - (800/2);
		var right = (screen.height/2) - (640/2);

		window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
	}
</script>
@stop