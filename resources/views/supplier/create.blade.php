@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Tambah Supplier</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::open(['url'=>'supplier', 'method'=>'post', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="nama_supl">Nama Supplier</label>
					<div class="controls">
						{!! Form::input('text', 'nama_supl', Request::old('nama_supl'), ['id'=>'nama_supl', 'class'=>'span6']) !!}
						{!!$errors->first('nama_supl', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="alamat">Alamat Supplier</label>
					<div class="controls">
						{!! Form::input('text', 'alamat', Request::old('alamat'), ['id'=>'alamat', 'class'=>'span6']) !!}
						{!!$errors->first('alamat', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="hp">No. HP.</label>
					<div class="controls">
						{!! Form::input('text', 'hp', Request::old('hp'), ['id'=>'hp', 'class'=>'span6']) !!}
						{!!$errors->first('hp', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Save</button> 
					<a class="btn btn-success" href="{!! route('obat.create') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop