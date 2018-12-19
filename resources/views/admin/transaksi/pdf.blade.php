<!DOCTYPE html>
<html>
<head>
    <title>Cetak Transaksi</title>
</head>
<body>
	<h1>Data Transaksi Buku</h1>
	<div id="myDiv">
		<table class="table" border="1" cellspacing="0" cellpadding="2" width="100%">
			<thead class=".thead-dark">
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
					<tr>
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

</body>

</html>