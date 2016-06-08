@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-chart"></i>
		<h3>Informasi</h3>
	</div>

	<div class="widget-content">
		<h2>Informasi total pendapatan hari ini</h2>
		Total pendapatan hari ini <b> Rp {!! number_format($total, 0, '', '.') !!} </b>
		<br>

		@foreach($totalperuser as $data)
			Pendapatan user <b>{!! $data->name !!}</b> = Rp {!! number_format($data->totalpendapatan, 0, '', '.')!!} <br>
		@endforeach

	</div>
</div> 
@stop