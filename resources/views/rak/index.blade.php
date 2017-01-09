@extends('layout.default')
@section('content')
<div class="span6">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("rak.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<a class="btn btn-success" href="{!! route('obat.create') !!}">Back</a>
<p></p>
<div class="widget widget-table table-action">
	<div class="widget-header">
		<i class="icon-list"></i>
		<h3>Rak</h3>
	</div>

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<?php $no = 1; ?>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Rak</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($raks as $rak)
					<tr>
						<td>{!! $no !!}</td>
						<td>{!! $rak->nama_rak !!}</td>
						<td>
							{{-- <form method="delete" action="{!! route('rak.destroy', ['rak'=>$rak->id]) !!}">
								{{ csrf_field() }}
								<button class="btn btn-small btn-warning" title="Hapus" type="submit"><i class="btn-icon-only icon-remove"></i></button>
							</form> --}}

							{!! Form::open(array('url' => "rak/".$rak->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); !!}
            				{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus', 'onclick'=>'return confirm("Yakin ingin menghapus?");')); !!}
            				{!! Form::close(); !!}
            				
							
							<a class="btn btn-small btn-success" title="Edit" href="{!! route('rak.edit', ['rak'=>$rak->id]) !!}">Edit <i class="btn-icon-only icon-edit"></i></a>
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