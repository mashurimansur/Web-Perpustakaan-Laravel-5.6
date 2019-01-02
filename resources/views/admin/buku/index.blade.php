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
	<div class="row">
		<div class="col-md-8">
			<a href="{{ route('buku_create') }}" class="btn btn-primary">Tambah Data</a>
		</div>
		<div class="col-md-4">
			<form class="form-inline" method="get">
				<input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-primary btn-rounded btn-sm" type="submit">Search</button>
			</form>
		</div>
	</div>
		
	<br>
	<br>
	<table class="table table-bordered datatable" id="table-1">
		<thead>
			<tr>
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
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<ul class="pagination">
						{{ $buku->render() }}
					</ul>						
				</div>
			</div>
		</div>
@endsection