@extends('layout.default')
@section('content')
<div class="span6">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("merk.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<a class="btn btn-success" href="{!! route('obat.create') !!}">Back</a>
<p></p>
<div class="widget widget-table table-action">
	<div class="widget-header">
		<i class="icon-list"></i>
		<h3>Merk</h3>
	</div>

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<?php $no = 1; ?>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Merk</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($merks as $merk)
					<tr>
						<td>{!! $no !!}</td>
						<td>{!! $merk->nama_merk !!}</td>
						<td>

							{!! Form::open(array('url' => "merk/".$merk->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); !!}
            				{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus','onclick'=>'return confirm("Yakin ingin menghapus?");')); !!}
            				{!! Form::close(); !!}
							
							<a class="btn btn-small btn-success" title="Edit" href="{!! route('merk.edit', ['merk'=>$merk->id]) !!}">Edit <i class="btn-icon-only icon-edit"></i></a>
							
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