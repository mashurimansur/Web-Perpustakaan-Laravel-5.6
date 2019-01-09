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
				<input class="form-control" name="search" type="text" value="{{ $search }}" placeholder="Search" aria-label="Search">
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
				<th>Kategori Buku</th>
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
					<td>{{ $b->kategori->kategori }}</td>
					<td>{{ $b->pengarang }}</td>
					<td>{{ $b->penerbit }}</td>
					<td>{{ $b->tahun }}</td>
					<td>{{ $b->stok }}</td>
					<td width="10px">
						<a href="{{ route('buku_edit', ['id' => $b->id]) }}" class="btn btn-success">Edit</a>
					</td>
					<td width="10px">
						<button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" data-id="{{ $b->id }}">Delete</button>
						
						{{-- <form action="{{ route('buku_delete') }}" method="post">
							{{ csrf_field() }}

							<input type="hidden" name="id" value="{{ $b->id }}">
							<button type="submit" class="btn btn-danger">Hapus</button>
						</form> --}}
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

@section('modal')
	<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-sm" role="document">
			<form action="{{ route('buku_delete') }}" method="post">

				{{ csrf_field() }}

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Hapus data buku</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" name="id">
						Are you sure you want to delete this data?
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
						<button type="submit" class="btn btn-danger">Yes</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection

@section('registerscript')
	<script>
		$('#modal-delete').on('show.bs.modal', function (e) {
			var id = $(e.relatedTarget).data('id');
			$(this).find('input[name="id"]').val(id);
		});
	</script>
@endsection