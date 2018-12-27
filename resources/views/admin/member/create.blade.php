@extends('admin.layouts.main')

@section('title', 'Tambah Buku')
	
@section('contents')
	<ol class="breadcrumb bc-3">
		<li>
			<a href="index.html"><i class="entypo-home"></i>Home</a>
		</li>
		<li class="active">
			<strong>Tambah Member</strong>
		</li>
	</ol>	<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Tambah Member
				</div>
			</div>
			
			<div class="panel-body">
				
				<form action="{{ route('member_store') }}" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
					{{ csrf_field() }}
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Nama</label>
						
						<div class="col-sm-5">
							<input type="text" name="name" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Email</label>
						
						<div class="col-sm-5">
							<input type="text" name="email" class="form-control">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Status</label>
						
						<div class="col-sm-5">
							<select name="id_role" class="form-control">
								<option value="3">User</option>
								<option value="1">Admin</option>
								<option value="2">Pimpinan</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Password</label>
						
						<div class="col-sm-5">
							<input type="password" name="password" class="form-control">
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
							<button type="submit" class="btn btn-primary">Tambah</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	<br />
@endsection