@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-home"></i>
		<h3>Home</h3>
	</div>

	<div class="widget-content">
		<center>
		<h2>Apotek sederhana</h2>
		<img height="600" width="800" class="img-responsive" src={!! asset("img/apotek.jpg") !!} alt="Logo" title="Apotek">
		</center>
	</div>
</div> 
@stop