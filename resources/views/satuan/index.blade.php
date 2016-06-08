@extends('layout.default')
@section('content')
<div class="span6">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("satuan.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<p></p>
<div class="widget widget-table table-action">
	<div class="widget-header">
		<i class="icon-list"></i>
		<h3>Satuan</h3>
	</div>

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<?php $no = 1; ?>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Satuan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($satuans as $satuan)
					<tr>
						<td>{!! $no !!}</td>
						<td>{!! $satuan->nama_satuan !!}</td>
						<td>

							{!! Form::open(array('url' => "satuan/".$satuan->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); !!}
            				{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus','onclick'=>'return confirm("Yakin ingin menghapus?");')); !!}
            				{!! Form::close(); !!}
							
							<a class="btn btn-small btn-success" title="Edit" href="{!! route('satuan.edit', ['satuan'=>$satuan->id]) !!}">Edit <i class="btn-icon-only icon-edit"></i></a>
						</td>
					</tr>
				<?php $no++ ?>
				@endforeach
				
			</tbody>
		</table>
		
	</div>
</div> 
</div>
@stop