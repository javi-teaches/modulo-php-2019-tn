<?php
	require_once 'Usuario.php';

	if ($_POST) {
		$usuario = new Usuario($_POST['nombre'], $_POST['fechaDeNacimiento'], $_POST['correoElectronico'], $_POST['password']);

		$usuario->setEdad($_POST['edad']);

		echo "<pre>";
		var_dump($usuario);
		echo "</pre>";
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Usuario en OOP con PSOT</title>
	</head>
	<body>
		<form method="post">
			<div>
				<label>Nombre Completo</label>
				<input type="text" name="nombre">
			</div>
			<div>
				<label>Fecha de nacimiento</label>
				<input type="date" name="fechaDeNacimiento">
			</div>
			<div>
				<label>Correo electrónico</label>
				<input type="email" name="correoElectronico">
			</div>
			<div>
				<label>Edad</label>
				<input type="text" name="edad">
			</div>
			<div>
				<label>Password</label>
				<input type="password" name="password">
			</div>
			<button type="submit">Registrar</button>
		</form>
	</body>
</html>
