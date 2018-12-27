@extends('admin.layouts.main')

@section('title', 'List Buku')
	
@section('contents')
	<ol class="breadcrumb bc-3">
		<li>
			<a href="index.html"><i class="entypo-home"></i>Home</a>
		</li>
		<li class="active">
			<strong>List Member</strong>
		</li>
	</ol>
			
	<h2>List Member</h2>

	<br />
	<a href="{{ route('member_create') }}" class="btn btn-primary">Tambah Member</a>
	<br>
	<br>
	<table class="table table-bordered datatable" id="table-1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Status</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1;
			 ?>
			@foreach($member as $m)
				<tr class="odd gradeX">
					<td width="10px">{{ $no++ }}</td>
					<td>{{ $m->name }}</td>
					<td>{{ $m->email }}</td>
					<td>{{ $m->role->nama_role }}</td>
					<td width="20px">
						<a href="{{ route('member_edit', ['id' => $m->id]) }}" class="btn btn-success">Edit</a>
					</td>
					<td width="20px">
						<form action="{{ route('member_delete') }}" method="post">
							{{ csrf_field() }}

							<input type="hidden" name="id" value="{{ $m->id }}">
							<button type="submit" class="btn btn-danger">Hapus</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection