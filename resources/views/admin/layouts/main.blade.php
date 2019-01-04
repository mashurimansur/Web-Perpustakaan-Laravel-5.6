<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title', 'Admin')</title>

	@include('admin.layouts.partial.meta')
	
	@yield('styles')
</head>

<body class="page-body  page-fade" data-url="http://neon.dev">
	<div class="page-container">
		<!-- aside -->
		@include('admin.layouts.partial.aside')
		<!-- / aside -->

		<!-- header -->
		@include('admin.layouts.partial.header')
		<!-- / header -->
	</div>

	<hr />

	<div>
		@yield('contents')
	</div>
	
	<!-- footer -->
	@include('admin.layouts.partial.footer')
	<!-- / footer -->

	<!-- Javascript Libraries -->
	@include('admin.layouts.partial.script')

	@yield('modal')	
	@yield('registerscript')	

</body>
</html>