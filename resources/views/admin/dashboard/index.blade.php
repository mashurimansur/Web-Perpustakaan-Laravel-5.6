@extends('admin.layouts.main')

@section('title', 'Dashboard')
	
@section('contents')
	<div class="row">
		<div class="col-sm-6">
			<div class="tile-stats tile-red">
				<div class="icon"><i class="entypo-users"></i></div>
				<div class="num" data-start="0" data-end="{{ $member }}" data-postfix="" data-duration="1500" data-delay="0">0</div>
				
				<h3>Jumlah Member</h3>
			</div>
			
		</div>
		
		<div class="col-sm-6">
		
			<div class="tile-stats tile-green">
				<div class="icon"><i class="entypo-book"></i></div>
				<div class="num" data-start="0" data-end="{{ $buku }}" data-postfix="" data-duration="1500" data-delay="600">0</div>
				
				<h3>Jumlah Buku</h3>
			</div>
			
		</div>
	</div>
@endsection