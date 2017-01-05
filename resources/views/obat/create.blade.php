@extends('layout.default')
@section('content')
<div class="widget">
	<div class="widget-header">
		<i class="icon-bar-list"></i>
		<h3>Tambah Obat</h3>
	</div>

	<div class="widget-content">
		<div class="tab-pane" id="formcontrols">
			<div class="row">
				<div class="span5">
					{!! Form::open(['url'=>'obat', 'method'=>'post', 'class'=>'form-horizontal']) !!}
					<fieldset>
					
						<div class="control-group">
							<label class="control-label" for="nama_obat">Nama Obat</label>
							<div class="controls">
								{!! Form::input('text', 'nama_obat', Request::old('nama_obat'), ['id'=>'nama_obat', 'class'=>'','autofocus']) !!}
								{!!$errors->first('nama_obat', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="barcode">Barcode</label>
							<div class="controls">
								{!! Form::input('text', 'barcode', Request::old('barcode'), ['id'=>'barcode', 'class'=>'']) !!}
								{!!$errors->first('barcode', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="rak">Rak</label>
							<div class="controls">
								{!! Form::select('rak', $rak,  null, ['id'=>'rak']) !!}
								{!!$errors->first('rak', '<p class="help-block">:message</p>')!!}
								<a class="btn btn-info btn-xs" href="{!! route('rak.create') !!}"><i class="icon-plus"></i></a>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="golongan">Golongan</label>
							<div class="controls">

								{!! Form::select('golongan', $golongan,  null, ['id'=>'golongan']) !!}
								{!!$errors->first('golongan', '<p class="help-block">:message</p>')!!}
								<a class="btn btn-info btn-xs" href="{!! route('golongan.create') !!}"><i class="icon-plus"></i></a>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="merk">Merk</label>
							<div class="controls">
								{!! Form::select('merk', $merk,  null, ['id'=>'merk']) !!}
								{!!$errors->first('merk', '<p class="help-block">:message</p>')!!}
								<a class="btn btn-info btn-xs" href="{!! route('merk.create') !!}"><i class="icon-plus"></i></a>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="satuan">Satuan</label>
							<div class="controls">
								{!! Form::select('satuan', $satuan,  null, ['id'=>'satuan']) !!} 
								{!!$errors->first('satuan', '<p class="help-block">:message</p>')!!}
								<a class="btn btn-info btn-xs" href="{!! route('satuan.create') !!}"><i class="icon-plus"></i></a>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="supplier">Supplier / PBF</label>
							<div class="controls">
								{!! Form::select('supplier', $supplier,  null, ['id'=>'supplier']) !!}
								{!!$errors->first('supplier', '<p class="help-block">:message</p>')!!}
								<a class="btn btn-info btn-xs" href="{!! route('supplier.create') !!}"><i class="icon-plus"></i></a>
							</div>
						</div>

						<!--<div class="control-group">
							<label class="control-label" for="diskon">Diskon</label>
							<div class="controls"> -->
								{!! Form::input('hidden', 'diskon', '0', ['id'=>'diskon', 'class'=>'']) !!} 
								{!!$errors->first('diskon', '<p class="help-block">:message</p>')!!}
							<!--</div>
						</div>-->
					</fieldset>	
				</div>

				<div class="span5">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="harga_pokok">Harga Pokok</label>
							<div class="controls">
								{!! Form::input('text', 'harga_pokok', Request::old('harga_pokok'), ['id'=>'harga_pokok', 'class'=>'']) !!} 
								{!!$errors->first('harga_pokok', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="harga_jual">Harga Jual</label>
							<div class="controls">
								{!! Form::input('text', 'harga_jual', Request::old('harga_jual'), ['id'=>'harga_jual', 'class'=>'']) !!} 
								{!!$errors->first('harga_jual', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="isi">Isi</label>
							<div class="controls">
								{!! Form::input('text', 'isi', Request::old('isi'), ['id'=>'isi', 'class'=>'', 'required']) !!} 
								{!!$errors->first('isi', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="status">Status</label>
							<div class="controls">
								{!! Form::radio('status', 'J', true)!!} Masih dijual .
								{!! Form::radio('status', 'T')!!} Tidak dijual
								{!!$errors->first('status', '<p class="help-block">:message</p>')!!}
							</div>
						</div><br>

						<div class="control-group">
							<label class="control-label" for="kadaluarsa">Kadaluarsa</label>
							<div class="controls">
								{!! Form::input('text', 'kadaluarsa', Request::old('kadaluarsa'), ['id'=>'kadaluarsa', 'placeholder'=>'Tahun-Bulan-Hari']) !!}
								{!!$errors->first('kadaluarsa', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
					</fieldset>
				</div>

			</div>
			<div class="row">
				<div class="span5">
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Save</button> 
						<a class="btn btn-success" href="{!! route('obat.index') !!}">Cancel</a>
					</div> <!-- /form-actions -->
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div> 
@stop

@section('datatable')
<script type="text/javascript">
	$(document).ready(function() {
		$("#kadaluarsa").datepicker({
			dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
		});
	});
</script>
@stop
