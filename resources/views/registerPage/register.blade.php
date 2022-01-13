<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('register/css/montserrat-font.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('register/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="{{ asset('register/css/style.css') }}" />
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{ asset('register/js/script.js')}}"></script>
</head>

<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="/signup" method="post" id="registerFrom">
				@csrf
				<div class="form-left">
					<h2>{{ __('titleregister') }}</h2>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="name" id="name" class="input-text" placeholder="{{ __('name') }}" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="surname" id="surname" class="input-text" placeholder="{{ __('surname') }}" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="password" name="passwordRegister" id="passwordRegister" class="input-text" placeholder="{{ __('password') }}" required>
						</div>
						<div class="form-row form-row-2">
							<input type="password" name="repeatPasswordRegister" id="repeatPasswordRegister" class="input-text" placeholder="{{ __('repeatpassword') }}" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="day" id="birthDay" class="input-text" placeholder="{{ __('day') }}" required>
						</div>
						<div class="form-row form-row-3">
							<select name="month" id="birthMonth" class="input-text">
								<option value="choose" selected hidden>{{ __('month') }}</option>
								<option value="01">{{ __('january') }}</option>
								<option value="02">{{ __('february') }}</option>
								<option value="03">{{ __('march') }}</option>
								<option value="04">{{ __('april') }}</option>
								<option value="05">{{ __('may') }}</option>
								<option value="06">{{ __('june') }}</option>
								<option value="07">{{ __('july') }}</option>
								<option value="08">{{ __('august') }}</option>
								<option value="09">{{ __('september') }}</option>
								<option value="10">{{ __('october') }}</option>
								<option value="11">{{ __('november') }}</option>
								<option value="12">{{ __('dicember') }}</option>
							</select>
						</div>
						<div class="form-row form-row-4">
							<input type="text" name="year" id="birthYear" class="input-text" placeholder="{{ __('year') }}" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="accountRegister" id="accountRegister" class="input-text" placeholder="{{ __('account') }}">
					</div>
				</div>
				<div class="form-right">
					<h2>{{ __('title2register') }}</h2>
					<div class="form-row">
						<input type="email" name="emailRegister" id="emailRegister" class="emailRegister-text" required placeholder="{{ __('email') }}">
					</div>
					<div class="form-row">
						<input type="email" name="repeatEmail" id="repeatEmail" class="repeatEmail-text" required placeholder="{{ __('repeatemail') }}">
					</div>
					<div class="form-row">
						<input type="text" name="address" class="address" id="address" placeholder="{{ __('address') }}" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" class="code" id="code" placeholder="{{ __('code') }}" required>
							<!-- <select name="code" id="code" class="code">
								<option value="choose" selected  hidden>Prefijo +</option>	
							</select> -->
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="telephone" class="telephone" id="telephone" placeholder="{{ __('telephone') }}" required>
						</div>
					</div>
					<div class="form-checkbox">
						<label class="container">
							<p>{{ __('terms1') }} <a href="#" class="text">{{ __('terms2') }}</a> {{ __('terms3') }}</p>
							<input type="checkbox" name="checkbox" required>
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" id="registerSubmit" value="{{ __('send') }}">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>