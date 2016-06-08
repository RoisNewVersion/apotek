@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Tambah Hutang Supplier</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			{!! Form::open(['url'=>'hutangsupplier', 'method'=>'post', 'class'=>'form-horizontal']) !!}
			<fieldset>

				<div class="control-group">
					<label class="control-label" for="no_faktur">No Faktur</label>
					<div class="controls">
						{!! Form::input('text', 'no_faktur', Request::old('no_faktur'), ['id'=>'no_faktur', 'class'=>'span4', 'autofocus']) !!}
						{!!$errors->first('no_faktur', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="supplier_id">Nama Supplier</label>
					<div class="controls">

						{!! Form::select('supplier_id', $supplier,  null, ['id'=>'supplier_id']) !!}
						{!!$errors->first('supplier_id', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="tgl_datang">Tgl. Datang</label>
					<div class="controls">
						{!! Form::input('text', 'tgl_datang', Request::old('tgl_datang'), ['id'=>'tgl_datang', 'class'=>'span4', 'autofocus']) !!}
						{!!$errors->first('tgl_datang', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="tempo">Tgl. Tempo</label>
					<div class="controls">
						{!! Form::input('text', 'tempo', Request::old('tempo'), ['id'=>'tempo', 'class'=>'span4', 'autofocus']) !!}
						{!!$errors->first('tempo', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="jml_hutang">Jml. Hutang</label>
					<div class="controls">
						{!! Form::input('text', 'jml_hutang', Request::old('jml_hutang'), ['id'=>'jml_hutang', 'class'=>'span4', 'autofocus']) !!}
						{!!$errors->first('jml_hutang', '<p class="help-block">:message</p>')!!}
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="status">Status</label>
					<div class="controls">
					{!! Form::radio('status', 'B', true)!!} Belum Lunas .
						{!! Form::radio('status', 'L')!!} Sudah Lunas
						{!!$errors->first('status', '<p class="help-block">:message</p>')!!}
					</div>
				</div>				

				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Save</button> 
					<a class="btn btn-success" href="{!! route('hutangsupplier.index') !!}">Cancel</a>
				</div> <!-- /form-actions -->

			</fieldset>	
			{!! Form::close() !!}
		</div>
	</div>
</div> 
@stop

@section('datatable')
<script type="text/javascript">
	$(document).ready(function() {
		$("#tempo").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});

		$("#tgl_datang").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});
	});
</script>
@stop