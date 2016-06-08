@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Edit #{!! $supplier->nama_supl !!}</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::model($supplier, ['url'=>'supplier/'.$supplier->id, 'method'=>'put', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="nama_supplier">Nama supplier</label>
					<div class="controls">
						{!! Form::input('text', 'nama_supl', null, ['id'=>'nama_supl', 'class'=>'span6']) !!}
						{!!$errors->first('nama_supl', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="alamat">Alamat supplier</label>
					<div class="controls">
						{!! Form::input('text', 'alamat', null, ['id'=>'alamat', 'class'=>'span6']) !!}
						{!!$errors->first('alamat', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="hp">No. HP</label>
					<div class="controls">
						{!! Form::input('text', 'hp', null, ['id'=>'hp', 'class'=>'span6']) !!}
						{!!$errors->first('hp', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Edit</button> 
					<a class="btn btn-success" href="{!! route('supplier.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop