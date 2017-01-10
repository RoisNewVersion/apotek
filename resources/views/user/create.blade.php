@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Tambah user</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::open(['url'=>'user', 'method'=>'post', 'class'=>'form-horizontal']) !!}
			<fieldset>
			
				<div class="control-group">
					<label class="control-label" for="name">Nama user</label>
					<div class="controls">
						{!! Form::input('text', 'name', Request::old('name'), ['id'=>'name', 'class'=>'span6']) !!}
						{!!$errors->first('name', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="email">Email user</label>
					<div class="controls">
						{!! Form::input('text', 'email', Request::old('email'), ['id'=>'email', 'class'=>'span6']) !!}
						{!!$errors->first('email', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="password">Password user</label>
					<div class="controls">
						{!! Form::input('password', 'password', Request::old('password'), ['id'=>'password', 'class'=>'span6']) !!}
						{!!$errors->first('password', '<p class="help-block">:message</p>')!!}
					</div>
				</div>
				<input type="hidden" name="level" id="level" value="admin">
				{{-- <div class="control-group">
					<label class="control-label" for="level">Level user</label>
					<div class="controls">
						{!! Form::select('level', $role, null, ['id'=>'level', 'class'=>'span6']) !!}
						{!!$errors->first('level', '<p class="help-block">:message</p>')!!}
					</div>
				</div> --}}

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Save</button> 
					<a class="btn btn-success" href="{!! route('user.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->
	
			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop