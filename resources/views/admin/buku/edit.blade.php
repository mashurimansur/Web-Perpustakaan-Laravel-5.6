@extends('admin.layouts.main')

@section('title', 'Tambah Buku')
	
@section('contents')
	<ol class="breadcrumb bc-3">
		<li>
			<a href="index.html"><i class="entypo-home"></i>Home</a>
		</li>
		<li class="active">
			<strong>Tambah Buku</strong>
		</li>
	</ol>	<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Tambah Buku
				</div>
			</div>
			
			<div class="panel-body">
				
				<form action="{{ route('buku_update', ['id' => $buku->id]) }}" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
					
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT">
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">ISBN</label>
						
						<div class="col-sm-5">
							<input type="text" name="isbn" value="{{ $buku->isbn }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Judul Buku</label>
						
						<div class="col-sm-5">
							<input type="text" name="judul" value="{{ $buku->judul }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Nama Pengarang</label>
						
						<div class="col-sm-5">
							<input type="text" name="pengarang" value="{{ $buku->pengarang }}" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Jenis Buku</label>
						
						<div class="col-sm-5">
							<select name="id_kategori" class="form-control">
								@foreach ($kategori as $k)
								<option value="{{ $k->id }}" {{ ($buku->id_kategori == $k->id) ? 'selected' : '' }}>{{ $k->kategori }}</option>
								@endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Penerbit</label>
						
						<div class="col-sm-5">
							<input type="text" name="penerbit" value="{{ $buku->penerbit }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Tahun Terbit</label>
						
						<div class="col-sm-5">
							<input type="number" name="tahun" value="{{ $buku->tahun }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Stok</label>
						
						<div class="col-sm-5">
							<input type="number" name="stok" value="{{ $buku->stok }}" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Gambar</label>
						
						<div class="col-sm-5">
							<input type="file" name="image" class="form-control" id="field-file">
						</div>
					</div>
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-success">Update Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	<br />
@endsection