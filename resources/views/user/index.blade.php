@extends('layout.default')
@section('content')
<div class="span11">
<a class="btn btn-small btn-primary" title="Tambah" href={!! route("user.create") !!}><i class="btn-icon-only icon-pencil"></i> Tambah</a>
<p></p>
<div class="widget widget-table table-action">
	<div class="widget-header">
		<i class="icon-list"></i>
		<h3>User</h3>
	</div>

	<div class="widget-content">

		<table class="table table-striped table-bordered">
			<?php $no = 1; ?>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama User</th>
					<th>Username</th>
					<th>Password</th>

					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{!! $no !!}</td>
						<td>{!! $user->name !!}</td>
						<td>{!! $user->email !!}</td>
						<td>{!! $user->password !!}</td>
						
						<td>

							{!! Form::open(array('url' => "user/".$user->id, 'role' => 'form', 'method'=>'delete','style="display:inline;"', 'id'=>'myform')); !!}
            				{!! Form::submit('Delete', array('class' => 'btn btn-danger btn-small', 'title'=>'Hapus','onclick'=>'return confirm("Yakin ingin menghapus?");')); !!}
            				{!! Form::close(); !!}
							
							<a class="btn btn-small btn-success" title="Edit" href="{!! route('user.edit', ['user'=>$user->id]) !!}">Edit <i class="btn-icon-only icon-edit"></i></a>
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