@extends('layout.default')
@section('content')

<style type="text/css">
	.spinner {
		position: fixed;
		top: 50%;
		left: 50%;
		margin-left: -50px; /* half width of the spinner gif */
		margin-top: -50px; /* half height of the spinner gif */
		text-align:center;
		z-index:1234;
		overflow: auto;
		width: 100px; /* width of the spinner gif */
		height: 102px; /*hight of the spinner gif +2px to fix IE8 issue */
	}

	.finish{
		position: fixed;
		top: 55%;
		left: 50%;
		margin-left: -50px; /* half width of the spinner gif */
		margin-top: -50px; /* half height of the spinner gif */
	}

	.cetaknota{
		position: fixed;
		top: 55%;
		left: 50%;
		margin-left: -50px;
		margin-top: -50px;
	}
</style>

<div id="spinner" class="spinner" style="display:none;">
	<img id="img-spinner" src="{!! asset("img/ajax-loader.gif") !!}" alt="Loading"/>
</div>

<div class="widget">
	<div class="row">
		<div class="span5">
			<form action="{!! route('transaksi.store') !!}" id="tambah_obat" accept-charset="utf-8" method="post" class="form-horizontal">

				<input type="hidden" id="token" name="_token" value="{{ Session::getToken() }}">

				<label class="control-label" for="jenis">Jenis pembeli</label>
				<div class="controls">
					<select id="jenis" name="jenis">
						<option value="u">Umum</option>
						<option value="k">Khusus</option>
					</select>
				</div>

				<div class="controls">
					--------------------------------------------------
				</div>

				<input type="hidden" name="idobat" id="idobat" >
				<input type="hidden" id="hrg" name="hrg" >
				<input type="hidden" id="nama_obat_hidden" name="nama_obat_hidden" >

				<label class="control-label" for="barcode">Barcode / Nama obat</label>
				<div class="controls">

					<input id="barcode" class="span1" type="text" name="barcode" placeholder="Barcode"  autofocus> Atau
					<input class="span2" type="text" id="nama_obat" name="nama_obat" placeholder="Nama obat">
				</div>
				<p></p>
				{{--<div class="controls">
						Atau
					</div> --}}

					<label class="control-label" for="jumlah">Jumlah pembelian</label>
					<div class="controls">
						
						<input class="span1" type="number" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
					</div>

					<p></p>
					<div class="controls">
						<button class="btn btn-primary" type="submit">Tambahkan</button>
						<div id="finish" class="" style="display: inline">
							<a href="{{url('finish')}}" class="btn btn-warning">Selesai</a>
						</div>
					</div>
			</form>
		</div>
		<div class="span5">
			{{-- <label class="control-label" for="subtotal">Sub total</label>
			<div class="controls">
				<input type="text" id="subtotal" name="subtotal" placeholder="Sub total" readonly="">
			</div>

			<label class="control-label" for="total">Total</label>
			<div class="controls">
				<input type="text" id="total" name="total" placeholder="Total" readonly="">
			</div> --}}

			<div id="detailobat">
				<div id="d_id_obat"></div>
				<div id="d_harga_jual"></div>
				<div id="d_nama_rak"></div>
				<div id="d_nama_merk"></div>
			</div>

			{{-- <div id="finish" class="finish">
				<a href="{{url('finish')}}" class="btn btn-warning">Selesai</a>
			</div> --}}

			
			{{-- <div id="cetaknota" class="cetaknota">
				<a target="new" href="{{url('cetaknota')}}" class="btn btn-danger">Cetak Nota</a>
			</div> --}}
			
		</div>
	</div>
	
</div> 
<div class="">
<div class="">
	<div class="span12">
		<table id="pembelianobat" class="table table-bordered table-condensed table-striped">
			<thead>
				<tr>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Aksi</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
</div>
@stop

@section('datatable')

<script type="text/javascript">
	$(document).ready(function(){

     	//ajax setup
     	$.ajaxSetup({
     		headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
     	});

     	$("#detailobat").hide();
     	$("#finish").hide();

     	//reload page
     	$("#cetaknota").click(function(event) {
     		/* Act on the event */
     		// location.reload();
     		$("#cetaknota").hide();
     	});

     	
     	$("#barcode").autocomplete({
     		source: '{!! url("getbarcode") !!}',
     		minLenght: 4,
     		select: function(event, ui){

     			$("#detailobat").show();

     			$('#idobat').val(ui.item.id);
     			$('#nama_obat_hidden').val(ui.item.nama);
     			$('#hrg').val(ui.item.harga_jual);
     			$('#d_id_obat').html('ID obat : ' + ui.item.id);
     			$('#d_harga_jual').html('harga jual : Rp ' + ui.item.harga_jual);
     			$('#d_nama_rak').html('Rak : ' + ui.item.rak);
     			$('#d_nama_merk').html('Merk : ' + ui.item.merk);
     		}
     	});

     	$("#nama_obat").autocomplete({
     		source: '{!! url("getnamaobat") !!}',
     		minLenght: 3,
     		select: function(event, ui){

     			$("#detailobat").show();

     			$('#idobat').val(ui.item.id);
     			$('#nama_obat_hidden').val(ui.item.nama);
     			$('#hrg').val(ui.item.harga_jual);
     			$('#d_id_obat').html('ID obat : ' + ui.item.id);
     			$('#d_harga_jual').html('harga jual : Rp ' + ui.item.harga_jual);
     			$('#d_nama_rak').html('Rak : ' + ui.item.rak);
     			$('#d_nama_merk').html('Merk : ' + ui.item.merk);
     		}
     	});

        //perfom ajax
        $("#tambah_obat").submit(function(event) {
        	event.preventDefault();

        	$("#spinner").show();

        	var jenis = $("#jenis").val();
        	var idobat = $("input#idobat").val();
        	var nama = $("input#nama_obat_hidden").val();
        	var token = $("input#token").val();
        	var jumlah = $("input#jumlah").val();
        	var hrg = $("input#hrg").val();
        	var bar = $("input#barcode").val();

        	//var dataString = 'jenis=' +jenis+ '&_token=' +token+ '&idobat=' +idobat+ '&jumlah=' +jumlah;

        	$.ajax({
        		url: '{{ url('tambahdataobat') }}',
        		type: 'POST',
        		data: {'barcode': bar, 'jenis': jenis, 'idobat': idobat, 'nama': nama, 'jumlah': jumlah, 'token': token, 'hrg': hrg},
        		success: function (data){

        			$("#spinner").hide();

        			alert('sukses');
        			//location.reload();
        			$("input#idobat").val('');
        			$("input#jumlah").val('');
        			$("input#nama_obat_hidden").val('');
        			$("input#barcode").val('');
        			$("input#nama_obat").val('');
        			$("input#hrg").val('');

        			$("#detailobat").hide();
        			$("input#barcode").focus();
        		}
        	});

        });
		
        		//refresh spesific div
        		var oTable = $('#pembelianobat').DataTable({
        			// processing: true,
        			serverSide: true,
        			ajax: '{{ url('getobatbeli') }}',
        			columns: [
	        			{data: 'jenis', name: 'jenis'},
	        			{data: 'nama', name: 'nama'},
	        			{data: 'jumlah', name: 'jumlah'},
	        			{data: 'harga', name: 'harga'},
	        			{data: 'action', name: 'action'},
        			],
        			"drawCallback": function( settings ) {
        			         var table = this.api();
        			 
        			         if (table.page.info().recordsTotal > 0 ) {
        			            $('#finish').show();
        			         }
        			    }
        		});

        	// disable alert warning dataTable.
        	$.fn.dataTable.ext.errMode = 'throw';
        	//refresh table 2 detik sekali.
			setInterval( function () {
			    oTable.ajax.reload( null, false ); // user paging is not reset on reload
			}, 2000 );

});

</script>
@stop