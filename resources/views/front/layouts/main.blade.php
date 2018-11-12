<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title', 'Admin')</title>

	@include('front.layouts.partial.meta')
	
	@yield('styles')
</head>
<body>

	<div class="wrap">
		
		<!-- header -->
		@include('front.layouts.partial.header')
		<!-- / header -->

		@yield('contents')

		<!-- footer -->
		@include('front.layouts.partial.footer')
		<!-- / footer -->

	</div>
	<!-- Javascript Libraries -->
	@include('front.layouts.partial.script')

	@yield('registerscript')
</body>
</html>