@extends('front.layouts.main')

@section('title', 'Setting Profile')
	
@section('contents')
	<section class="breadcrumb">	
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<h1>Setting Profile</h1>	
				</div>
			</div>
		</div>
	</section>

	<section class="contact-container">
	
		<div class="container">
			
			<div class="row">
				<div class="col-md-3"></div>
				
				<div class="col-md-6">
					<form class="contact-form" role="form" method="post" action="{{ route('home_setting_store') }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						
						<div class="form-group">
							<input type="text" name="name" class="form-control" value="{{ $member->name }}" placeholder="Name:" />
						</div>
						
						<div class="form-group">
							<input type="text" name="email" class="form-control" value="{{ $member->email }}" placeholder="E-mail:" />
						</div>

						<div class="form-group">
							<input type="text" name="password" class="form-control" placeholder="Password:" />
						</div>

						<div class="form-group">
							<input type="file" name="image" class="form-control" />
						</div>
						
						<div class="form-group text-right">
							<button class="btn btn-primary" name="send">Send</button>
						</div>
						
					</form>
					
				</div>
				<div class="col-md-3"></div>
				
			</div>
			
		</div>
		
	</section>
@endsection