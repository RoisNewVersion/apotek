@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Edit #{!! $merk->nama_merk !!}</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::model($merk, ['url'=>'merk/'.$merk->id, 'method'=>'put', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="nama_merk">Nama Merk</label>
					<div class="controls">
						{!! Form::input('text', 'nama_merk', null, ['id'=>'nama_merk', 'class'=>'span6']) !!}
						{!!$errors->first('nama_merk', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Edit</button> 
					<a class="btn btn-success" href="{!! route('merk.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop