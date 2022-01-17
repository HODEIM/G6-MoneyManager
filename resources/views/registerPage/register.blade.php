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
	<link rel="stylesheet" href="{{ asset('register/css/register.css') }}" />
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
					<h2 >Informacion General</h2>
					<div class="form-group">
						<div class="form-row form-row-1 tooltip" style="visibility: visible;">
							<input type="text" name="name" id="name" class="input-text" placeholder="Nombre">
							<span class="tooltiptext">nombre</span>
						</div>
						<div class="form-row form-row-2 tooltip">
							<input type="text" name="surname" id="surname" class="input-text" placeholder="Apellidos">
							<span class="tooltiptext">apellidos</span>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1 tooltip">
							<input type="password" name="passwordRegister" id="passwordRegister" class="input-text" placeholder="Contraseña">
							<span class="tooltiptext">password</span>
						</div>
						<div class="form-row form-row-2 tooltip">
							<input type="password" name="repeatPasswordRegister" id="repeatPasswordRegister" class="input-text" placeholder="Repetir contraseña">
							<span class="tooltiptext">repeat</span>
						</div>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1 tooltip">
							<input type="text" name="day" id="birthDay" class="input-text" placeholder="Dia">
							<span class="tooltiptext">day</span>
						</div>
						<div class="form-row form-row-3 tooltip">
							<select name="month" id="birthMonth" class="input-text">
								<option value="choose" selected hidden>Mes</option>
								<option value="01">Enero</option>
								<option value="02">Febrero</option>
								<option value="03">Marzo</option>
								<option value="04">Abril</option>
								<option value="05">Mayo</option>
								<option value="06">Junio</option>
								<option value="07">Julio</option>
								<option value="08">Agosto</option>
								<option value="09">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
							<span class="tooltiptext">month</span>
						</div>
						<div class="form-row form-row-4 tooltip">
							<input type="text" name="year" id="birthYear" class="input-text" placeholder="Año">
							<span class="tooltiptext">year</span>
						</div>
					</div>
					<div class="form-row">
						<input type="text" name="accountRegister" id="accountRegister" class="input-text" placeholder="Cuenta">
					</div>
				</div>
				<div class="form-right">
					<h2>Detalles de contacto</h2>
					<div class="form-row tooltip">
						<input type="email" name="emailRegister" id="emailRegister" class="emailRegister-text" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Email">
						<span class="tooltiptext">email</span>
					</div>
					<div class="form-row tooltip">
						<input type="email" name="repeatEmail" id="repeatEmail" class="repeatEmail-text" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Repetir Email">
						<span class="tooltiptext">repeat</span>
					</div>
					<div class="form-row tooltip">
						<input type="text" name="address" class="address" id="address" placeholder="Dirección">
						<span class="tooltiptext">address</span>
					</div>
					<div class="form-group">
						<div class="form-row form-row-1 tooltip">
							<input type="text" name="code" class="code" id="code" placeholder="Prefijo +">
							<span class="tooltiptext">code</span>
							<!-- <select name="code" id="code" class="code">
								<option value="choose" selected  hidden>Prefijo +</option>	
							</select> -->
						</div>
						<div class="form-row form-row-2 tooltip">
							<input type="text" name="telephone" class="telephone" id="telephone" placeholder="Telefono">
							<span class="tooltiptext">telephone</span>
						</div>
					</div>
					<div class="form-row-last">
						<input type="submit" name="register" class="register" id="registerSubmit" value="Enviar">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>