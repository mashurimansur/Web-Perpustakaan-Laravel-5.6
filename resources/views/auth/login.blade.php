<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="{{ asset('assets') }}/login/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/login/css/main.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
                <img src="{{ asset('assets') }}/login/images/img-01.png" alt="IMG">
				</div>
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <span class="login100-form-title">
                        Member Login
                    </span>

                    @if ($errors->any())
                        <div style="color:red;">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <br>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-70">
                  		<a class="txt2" href="{{ route('register') }}">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
		
	<script src="{{ asset('assets') }}/login/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="{{ asset('assets') }}/login/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('assets') }}/login/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{ asset('assets') }}/login/vendor/select2/select2.min.js"></script>
	<script src="{{ asset('assets') }}/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="{{ asset('assets') }}/login/js/main.js"></script>

</body>
</html>