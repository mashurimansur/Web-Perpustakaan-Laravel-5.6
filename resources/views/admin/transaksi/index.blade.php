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
	<button onclick="printDiv('myDiv')" class="btn btn-primary">Cetak</button>
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
						<td>{{ $t->name }}</td>
						<td>{{ $t->judul }}</td>
						<td>{{ $t->tgl_pinjam }}</td>
						<td>{{ $t->tgl_kembali }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

@section('registerscript')
	<script>
		function printDiv(divName) {
		     var printContents = document.getElementById(divName).innerHTML;
		     var originalContents = document.body.innerHTML;
		     document.body.innerHTML = printContents;
		     window.print();
		     document.body.innerHTML = originalContents;
		}
	</script>
@endsection