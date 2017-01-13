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
					<form class="form-horizontal" accept-charset="utf-8">
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
							<button type="button" id="clikcShow" class="btn btn-primary">Show</button> 
						</div>
					</div>
					</form>
					{{-- {!! Form::open(['url'=>'laporan/cetakperrak', 'method'=>'post', 'class'=>'form-horizontal']) !!}
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
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</div> 
@stop

@section('datatable')
<script type="text/javascript">
	$(document).ready(function() {
		$('#clikcShow').click(function(event) {
				// console.log('hei');
				var left = (screen.width/2) - (800/2);
				var right = (screen.height/2) - (640/2);
				var idrak = $('#rak').val();

				var url = '{{url('laporan/cetakperrakget/')}}'+'/'+idrak;

				window.open(url, '', 'width=800, height=640, scrollbars=yes, left='+left+', right='+right+'');
			});
	});
</script>
@stop