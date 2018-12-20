<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('assets') }}/register/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/register/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #999999;">
	
	<div class="limiter">
		<div class="container-login100">
        <div class="login100-more" style="background-image: url('{{ asset('assets') }}/register/images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                    @csrf
                    <input type="hidden" name="status" value="User">    
                    <input type="hidden" name="image" value="user.png">    
					<span class="login100-form-title p-b-59">
						Sign Up
					</span>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <br>
					<div class="wrap-input100 validate-input" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Name...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Email addess...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Repeat Password is required">
						<span class="label-input100">Repeat Password</span>
						<input class="input100" type="password" name="password_confirmation" placeholder="*************">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Sign Up
							</button>
						</div>

						<a href="{{ route('login') }}" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="{{ asset('assets') }}/register/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets') }}/register/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets') }}/register/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('assets') }}/register/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets') }}/register/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets') }}/register/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('assets') }}/register/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets') }}/register/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assets') }}/register/js/main.js"></script>

</body>
</html>