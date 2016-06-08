@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-chart"></i>
		<h3>Icon</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::open(['url'=>'retur', 'method'=>'post', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="idt">ID Transaksi</label>
					<div class="controls">
						{!! Form::input('text', 'idt', Request::old('idt'), ['id'=>'idt', 'class'=>'span3', 'autofocus']) !!}
						{!!$errors->first('idt', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Retur</button> 
					{{-- <a class="btn btn-success" href="{!! url('retur') !!}">Cancel</a> --}}
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop