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
					{!! Form::model($obat, ['url'=>'obat/'.$obat->id, 'method'=>'put', 'class'=>'form-horizontal']) !!}
					<fieldset>
						
						<div class="control-group">
							<label class="control-label" for="nama_obat">Nama Obat</label>
							<div class="controls">
								{!! Form::input('text', 'nama_obat', null, ['id'=>'nama_obat', 'class'=>'','autofocus']) !!}
								{!!$errors->first('nama_obat', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="barcode">Barcode</label>
							<div class="controls">
								{!! Form::input('text', 'barcode', null, ['id'=>'barcode', 'class'=>'']) !!}
								{!!$errors->first('barcode', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="golongan">Golongan</label>
							<div class="controls">

								{!! Form::select('golongan', $golongan,  null, ['id'=>'golongan']) !!}
								{!!$errors->first('golongan', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="merk">Merk</label>
							<div class="controls">
								{!! Form::select('merk', $merk,  null, ['id'=>'merk']) !!}
								{!!$errors->first('merk', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
					</fieldset>	
				</div>
				<div class="span5">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="supplier">Supplier / PBF</label>
							<div class="controls">
								{!! Form::select('supplier', $supplier,  null, ['id'=>'supplier']) !!}
								{!!$errors->first('supplier', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="rak">Rak</label>
							<div class="controls">
								{!! Form::select('rak', $rak,  null, ['id'=>'rak']) !!}
								{!!$errors->first('rak', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
						<input type="hidden" name="diskon" id="diskon" value="0">
						{{-- <div class="control-group">
							<label class="control-label" for="diskon">Diskon</label>
							<div class="controls">
								{!! Form::input('text', 'diskon', null, ['id'=>'diskon', 'class'=>'']) !!} %
								{!!$errors->first('diskon', '<p class="help-block">:message</p>')!!}
							</div>
						</div> --}}
					</fieldset>
				</div>

				<div class="span5">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="satuan">Satuan</label>
							<div class="controls">
								{!! Form::select('satuan', $satuan,  null, ['id'=>'satuan']) !!} 
								{!!$errors->first('satuan', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="isi">Isi</label>
							<div class="controls">
								{!! Form::input('text', 'isi', null, ['id'=>'isi', 'class'=>'']) !!} 
								{!!$errors->first('isi', '<p class="help-block">:message</p>')!!}
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="harga_pokok">Harga Pokok</label>
							<div class="controls">
								{!! Form::input('text', 'harga_pokok', null, ['id'=>'harga_pokok', 'class'=>'']) !!} 
								{!!$errors->first('harga_pokok', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
					</fieldset>
				</div>

				<div class="span5">
					<fieldset>
						<div class="control-group">
							<label class="control-label" for="harga_jual">Harga Jual</label>
							<div class="controls">
								{!! Form::input('text', 'harga_jual', null, ['id'=>'harga_jual', 'class'=>'']) !!} 
								{!!$errors->first('harga_jual', '<p class="help-block">:message</p>')!!}
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
								{!! Form::input('text', 'kadaluarsa', null, ['id'=>'kadaluarsa', 'placeholder'=>'Tahun/Bulan/Hari']) !!}
								{!!$errors->first('kadaluarsa', '<p class="help-block">:message</p>')!!}
							</div>
						</div>
					</fieldset>
				</div>
				<div class="span5">
					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Edit</button> 
						<a class="btn btn-success" href="{!! route('obat.index') !!}">Cancel</a>
					</div> <!-- /form-actions -->
					{!! Form::close() !!}
				</div>
			</div>
			
		</div>
	</div>
</div> 
@stop