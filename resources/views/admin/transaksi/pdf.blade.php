<!DOCTYPE html>
<html>
<head>
    <title>Cetak Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<h1>Data Transaksi</h1>
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

</body>

</html>