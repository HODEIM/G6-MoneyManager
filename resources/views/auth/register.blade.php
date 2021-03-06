<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/logo_negro.ico') }}" />
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{ asset('registerStyle/css/montserrat-font.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('registerStyle/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="{{ asset('registerStyle/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('registerStyle/css/register.css') }}" />
	<!--Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{ asset('registerStyle/js/script.js')}}"></script>
	<style>
		@media screen and (max-width: 767px) {
			.logo img {
				content: url("{{ asset('assets/logo/logo_negro.ico') }}");
			}
		}
	</style>
</head>

<body class="form-v10">
	<div class="page-content">
		<div class="form-v10-content">
			<form class="form-detail" action="{{ route('register') }}" method="post" id="registerFrom">
				@csrf
				<div class="form-left">
					<h2>{{ __('titleregister') }}</h2>
					<div class="logo">
						<a href="/"><img src="{{ asset('assets/logo/logo_unificado.ico') }}"></a>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<div class="tooltip">
								<input type="text" name="name" id="name" class="input-text" placeholder="{{ __('name') }}">
								<div class="nametooltip">
									<span class="tooltiptext">nombre</span>
								</div>
							</div>
						</div>
						<div class="form-row form-row-2">
							<div class="tooltip">
								<input type="text" name="surname" id="surname" class="input-text" placeholder="{{ __('surname') }}">
								<div class="surnametooltip">
									<span class="tooltiptext">apellidos</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<div class="tooltip">
								<input type="password" name="password" id="passwordRegister" class="input-text" placeholder="{{ __('password') }}">
								<div class="passwordtooltip">
									<span class="tooltiptext">password</span>
								</div>
							</div>
						</div>
						<div class="form-row form-row-2">
							<div class="tooltip">
								<input type="password" name="repeatPasswordRegister" id="repeatPasswordRegister" class="input-text" placeholder="{{ __('repeatpassword') }}">
								<div class="repeatpasswordtooltip">
									<span class="tooltiptext">repeat</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-3">
							<div class="form-row form-row-1">
								<div class="tooltip">
									<input type="text" name="day" id="birthDay" class="input-text" placeholder="{{ __('day') }}">
									<div class="daytooltip">
										<span class="tooltiptext">day</span>
									</div>
								</div>
							</div>
							<div class="form-row form-row-3">
								<div class="tooltip">
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
									<div class="monthtooltip">
										<span class="tooltiptext">month</span>
									</div>
								</div>
							</div>
							<div class="form-row form-row-4">
								<div class="tooltip">
									<input type="text" name="year" id="birthYear" class="input-text" placeholder="{{ __('year') }}">
									<div class="yeartooltip">
										<span class="tooltiptext">year</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="accountRegister" id="accountRegister" class="input-text" placeholder="{{ __('account') }}">
					</div>
				</div>
				<div class="form-right">
					<h2 class="text-alignment">{{ __('title2register') }}</h2>
					<div class="form-row">
						<div class="tooltip">
							<input type="email" name="email" id="emailRegister" class="emailRegister-text text-alignment" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="{{ __('email') }}">
							<div class="emailtooltip" id="emailtooltip">
								<span class="tooltiptext">email</span>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="tooltip">
							<input type="email" name="repeatEmail" id="repeatEmail" class="repeatEmail-text text-alignment" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="{{ __('repeatemail') }}">
							<div class="repeatemailtooltip" id="repeatemailtooltip">
								<span class="tooltiptext">repeat</span>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="tooltip">
							<input type="text" name="address" class="address text-alignment" id="address" placeholder="{{ __('address') }}">
							<div class="addresstooltip" id="addresstooltip">
								<span class="tooltiptext">address</span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1 tooltip">
							<div class="tooltip">
								<input type="text" name="code" class="code text-alignment" placeholder="{{ __('code') }}">
								<div class="codetooltip" id="codetooltip">
									<span class="tooltiptext">code</span>
								</div>
								<!-- <select name="code" id="code" class="code">
									<option value="choose" selected  hidden>Prefijo +</option>	
								</select> -->
							</div>
						</div>
						<div class="form-row form-row-2">
							<div class="tooltip">
								<input type="text" name="telephone" class="telephone text-alignment" id="telephone" placeholder="{{ __('telephone') }}">
								<div class="telephonetooltip" id="telephonetooltip">
									<span class="tooltiptext">telephone</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" id="registerSubmit" value="{{ __('send') }}">
					</div>
				</div>
			</form>
			@if($errors->any())
			{{ implode('', $errors->all('<div>:message</div>')) }}
			@endif

		</div>
	</div>
</body>

</html>