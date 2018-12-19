@extends('admin.layouts.main')

@section('title', 'Log Transaksi')
	
@section('contents')
	<ol class="breadcrumb bc-3">
		<li>
			<a href="#"><i class="entypo-home"></i>Home</a>
		</li>
		<li class="active">
			<strong>Log Transaksi</strong>
		</li>
	</ol>
			
	<h2>Log Transaksi</h2>

	<br />
	<a href="{{ route('transaksi_pdf') }}" class="btn btn-primary">Cetak</a>
	<br>
	<br>
	<div id="myDiv">
		<table class="table table-bordered datatable">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Peminjam</th>
					<th>Judul Buku</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				@foreach($transaksi as $t)
					<tr class="odd gradeX">
						<td>{{ $no++ }}</td>
						<td>{{ $t->user->name }}</td>
						<td>{{ $t->buku->judul }}</td>
						<td>{{ $t->tgl_pinjam }}</td>
						<td>{{ $t->tgl_kembali }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection