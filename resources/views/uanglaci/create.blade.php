@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Tambah uang laci</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::open(['url'=>'uanglaci', 'method'=>'post', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="nominal">Nominal uang laci</label>
					<div class="controls">
						{!! Form::input('text', 'nominal', Request::old('nominal'), ['id'=>'nominal', 'class'=>'span6', 'autofocus']) !!}
						{!!$errors->first('nominal', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Save</button> 
					<a class="btn btn-success" href="{!! route('uanglaci.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop