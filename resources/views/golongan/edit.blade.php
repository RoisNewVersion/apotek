@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Edit #{!! $gols->nama_gol !!}</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::model($gols, ['url'=>'golongan/'.$gols->id, 'method'=>'put', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="nama_rak">Nama Golongan</label>
					<div class="controls">
						{!! Form::input('text', 'nama_gol', null, ['id'=>'nama_gol', 'class'=>'span6']) !!}
						{!!$errors->first('nama_gol', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Edit</button> 
					<a class="btn btn-success" href="{!! route('golongan.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop