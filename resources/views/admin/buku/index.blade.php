@extends('admin.layouts.main')

@section('title', 'List Buku')
	
@section('contents')
	<ol class="breadcrumb bc-3">
		<li>
			<a href="index.html"><i class="entypo-home"></i>Home</a>
		</li>
		<li class="active">
			<strong>List Buku</strong>
		</li>
	</ol>
			
	<h2>List Buku</h2>

	<br />
	<a href="{{ route('buku_create') }}" class="btn btn-primary">Tambah Data</a>
	<br>
	<br>
	<table class="table table-bordered datatable" id="table-1">
		<thead>
			<tr>
				<th>No</th>
				<th>ISBN</th>
				<th>Judul Buku</th>
				<th>Jenis Buku</th>
				<th>Nama Pengarang</th>
				<th>Penerbit</th>
				<th>Tahun Terbit</th>
				<th>Stok</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; ?>
			@foreach($buku as $b)
				<tr class="odd gradeX">
					<td>{{ $no++ }}</td>
					<td>{{ $b->isbn }}</td>
					<td>{{ $b->judul }}</td>
					<td>{{ $b->jenis }}</td>
					<td>{{ $b->pengarang }}</td>
					<td>{{ $b->penerbit }}</td>
					<td>{{ $b->tahun }}</td>
					<td>{{ $b->stok }}</td>
					<td width="10px">
						<a href="{{ route('buku_edit', ['id' => $b->id]) }}" class="btn btn-success">Edit</a>
					</td>
					<td width="10px">
						<form action="{{ route('buku_delete') }}" method="post">
							{{ csrf_field() }}

							<input type="hidden" name="id" value="{{ $b->id }}">
							<button type="submit" class="btn btn-danger">Hapus</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection