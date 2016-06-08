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
			{!! Form::open(['url'=>'laporan/mingguan', 'method'=>'post'])!!}

				{!! Form::input('text', 'tglawal', Request::old('tglawal'), ['id'=>'tglawal', 'class'=>'span2']) !!}
				{!!$errors->first('tglawal', '<p class="help-block">:message</p>')!!} | 

				{!! Form::input('text', 'tglakhir', Request::old('tglakhir'), ['id'=>'tglakhir', 'class'=>'span2']) !!}
				{!!$errors->first('tglakhir', '<p class="help-block">:message</p>')!!}

				{!! Form::submit('Cetak', ['class'=>'btn btn-primary'])!!}
			{!! Form::close() !!}
		<hr>
		<h2>Cetak laporan bulanan</h2>
		{!! Form::open(['url'=>'laporan/bulanan', 'method'=>'post'])!!}

				{!! Form::input('text', 'tglbulanan', Request::old('tglbulanan'), ['id'=>'tglbulanan', 'class'=>'span2']) !!}
				{!!$errors->first('tglbulanan', '<p class="help-block">:message</p>')!!}

				{!! Form::submit('Cetak', ['class'=>'btn btn-primary'])!!}
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
	});
</script>
@stop