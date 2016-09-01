@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-print"></i>
		<h3>Cetak Penjualan</h3>
	</div>

	<div class="widget-content">
		<h2>Cetak laporan harian</h2>
			<a target="new" class="btn btn-default" href="{!! url('laporan/harian') !!}"> Cetak</a>
		<hr>
		<h2>Cetak laporan mingguan</h2>
			<form >

				{!! Form::input('text', 'tglawal', Request::old('tglawal'), ['id'=>'tglawal', 'class'=>'span2']) !!}
				{!!$errors->first('tglawal', '<p class="help-block">:message</p>')!!} | 

				{!! Form::input('text', 'tglakhir', Request::old('tglakhir'), ['id'=>'tglakhir', 'class'=>'span2']) !!}
				{!!$errors->first('tglakhir', '<p class="help-block">:message</p>')!!}

				<button id="mingguan" type="button" class="btn btn-primary">Cetak</button>
			{!! Form::close() !!}
		<hr>
		<h2>Cetak laporan bulanan</h2>
			<form>

				{!! Form::input('text', 'tglbulanan', Request::old('tglbulanan'), ['id'=>'tglbulanan', 'class'=>'span2']) !!}
				{!!$errors->first('tglbulanan', '<p class="help-block">:message</p>')!!}

				<button id="bulanan" type="button" class="btn btn-primary">Cetak</button>
			{!! Form::close() !!}
	</div>
</div> 
@stop

@section('datatable')
<script type="text/javascript">
	$(document).ready(function() {
		// tglawal
		$("#tglawal").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});
		// tglakhir
		$("#tglakhir").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});

		// bulanan
		$("#tglbulanan").datepicker({
			dateFormat: 'mm',
            changeMonth: true,
            changeYear: true,
            
		});

		// mingguan
		$('#mingguan').click(function(event) {
			// alert('minggu');
			var tglawal = $('#tglawal').val();
			var tglakhir = $('#tglakhir').val();

			var left = (screen.width/2) - (800/2);
			var right = (screen.height/2) - (640/2);

			var url = '{{url('laporan/mingguan?')}}'+'tglawal='+tglawal+'&tglakhir='+tglakhir;

			window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
		});

		// bulanan
		$('#bulanan').click(function(event) {
			var tglbulanan = $('#tglbulanan').val();

			var left = (screen.width/2) - (800/2);
			var right = (screen.height/2) - (640/2);

			var url = '{{url('laporan/bulanan?')}}'+'tglbulanan='+tglbulanan;

			window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
		});
	});
</script>
@stop