@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::model($uanglaci, ['url'=>'uanglaci/'.$uanglaci->id, 'method'=>'put', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="nominal">Nominal uang laci</label>
					<div class="controls">
						{!! Form::input('text', 'nominal', null, ['id'=>'nominal', 'class'=>'span6']) !!}
						{!!$errors->first('nominal', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Edit</button> 
					<a class="btn btn-success" href="{!! route('uanglaci.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop