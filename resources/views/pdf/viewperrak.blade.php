@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-chart"></i>
		<h3>Cetak Obat Per Rak</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			<div class="row">
				<div class="span5">
					{!! Form::open(['url'=>'laporan/cetakperrak', 'method'=>'post', 'class'=>'form-horizontal']) !!}
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="golongan">Rak</label>
							<div class="controls">

								{!! Form::select('rak', $rak,  null, ['id'=>'rak']) !!}
								{!!$errors->first('rak', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
					</fieldset>
					<div class="span5">
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">Cetak</button> 
							
						</div> <!-- /form-actions -->
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
@stop