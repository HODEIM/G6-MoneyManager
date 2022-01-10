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
					<h2>Informacion General</h2>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="name" id="name" class="input-text" placeholder="Nombre" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="surname" id="surname" class="input-text" placeholder="Apellidos" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="password" name="passwordRegister" id="passwordRegister" class="input-text" placeholder="Contraseña" required>
						</div>
						<div class="form-row form-row-2">
							<input type="password" name="rePasswordRegister" id="rePasswordRegister" class="input-text" placeholder="Repetir contraseña" required>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="day" id="passwordRegister" class="input-text" placeholder="Contraseña" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="Month" id="rePasswordRegister" class="input-text" placeholder="Repetir contraseña" required>
						</div>
						<div class="form-row form-row-3">
							<input type="text" name="rePasswordRegister" id="rePasswordRegister" class="input-text" placeholder="Repetir contraseña" required>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="accountRegister" id="accountRegister" class="input-text" placeholder="Cuenta" required>
					</div>					
				</div>
				<div class="form-right">
					<h2>Detalles de contacto</h2>
					<div class="form-row">
						<input type="email" name="emailRegister" id="emailRegister" class="emailRegister-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>
					<div class="form-row">
						<input type="text" name="address" class="address" id="street" placeholder="Dirección" required>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1">
							<input type="text" name="code" class="code" id="code" placeholder="Code +" required>
						</div>
						<div class="form-row form-row-2">
							<input type="text" name="telephone" class="phone" id="phone" placeholder="Phone Number" required>
						</div>
					</div>
					<div class="form-checkbox">
						<label class="container">
							<p>Aceptó  los <a href="#" class="text">Términos y condiciones</a> de la web.</p>
							<input type="checkbox" name="checkbox">
							<span class="checkmark"></span>
						</label>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" id="registerSubmit">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>