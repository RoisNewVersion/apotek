@extends('layout.default')
@section('content')
<div class="span6">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("uanglaci.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<p></p>
<div class="widget widget-table table-action">
	<div class="widget-header">
		<i class="icon-list"></i>
		<h3>Uang laci</h3>
	</div>

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<?php $no = 1; ?>
			<thead>
				<tr>
					<th>No</th>
					<th>Nominal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($uanglaci as $uang)
					<tr>
						<td>{!! $no !!}</td>
						<td>Rp {!! number_format($uang->nominal, 0, '', '.') !!}</td>
						<td>
							{!! Form::open(array('url' => "uanglaci/".$uang->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); !!}
            				{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus', 'onclick'=>'return confirm("Yakin ingin menghapus?");')); !!}
            				{!! Form::close(); !!}
            				
							
							<a class="btn btn-small btn-success" title="Edit" href="{!! route('uanglaci.edit', ['uanglaci'=>$uang->id]) !!}">Edit <i class="btn-icon-only icon-edit"></i></a>
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