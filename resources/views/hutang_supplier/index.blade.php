@extends('layout.default')
@section('content')
<div class="span10">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("hutangsupplier.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<p></p>
<div class="widget widget-table table-action">
	<div class="widget-header">
		<i class="icon-list"></i>
		<h3>Hutang Supplier</h3>
	</div>

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<?php $no = 1; ?>
			<thead>
				<tr>
					<th>No</th>
					<th>No. Faktur</th>
					<th>Nama Supplier</th>
					<th>Jatuh Tempo</th>
					<th>Jml. Hutang</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($hutangs as $hutang)
					<tr>
						<td>{!! $no !!}</td>
						<td>{!! $hutang->no_faktur !!}</td>
						<td>{!! $hutang->supplier->nama_supl !!}</td>
						<td>{!! $hutang->tempo !!}</td>
						<td>Rp. {!! number_format($hutang->jml_hutang, 0, '', '.')  !!}</td>
						<td {!! $hutang->status == 'B' ? 'style="background:red"' : '' !!} > {!! $hutang->status == 'B' ? 'Belum Lunas' : 'Sudah Lunas' !!}</td>
						<td>
						
							{!! Form::open(array('url' => "hutangsupplier/".$hutang->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); !!}
            				{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus', 'onclick'=>'return confirm("Yakin ingin menghapus?");')); !!}
            				{!! Form::close(); !!}
            				
							
							<a class="btn btn-small btn-success" title="Edit" href="{!! route('hutangsupplier.edit', ['hutangsupplier'=>$hutang->id]) !!}">Edit <i class="btn-icon-only icon-edit"></i></a>
						</td>
					</tr>
				<?php $no++ ?>
				@endforeach
				
			</tbody>
		</table>
		
	</div>
	{!! $hutangs->render() !!}
</div> 
</div>
@stop