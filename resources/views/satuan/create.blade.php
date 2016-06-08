@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Tambah Satuan</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::open(['url'=>'satuan', 'method'=>'post', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="nama_satuan">Nama Satuan</label>
					<div class="controls">
						{!! Form::input('text', 'nama_satuan', Request::old('nama_satuan'), ['id'=>'nama_satuan', 'class'=>'span6', 'autofocus']) !!}
						{!!$errors->first('nama_satuan', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Save</button> 
					<a class="btn btn-success" href="{!! route('satuan.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop