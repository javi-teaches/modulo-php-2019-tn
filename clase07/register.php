<?php

	$nombre = "";
	$clave = "";

	if ($_POST) {
		$nombre = trim($_POST["nombre"]);
		$correo = trim($_POST["correo"]);
		$clave = trim($_POST["clave"]);

		$errores = [];

		if ($nombre == "") {
			$errores["nombre"] = "El campo nombre es obligatorio";
		}

		if ($correo == "") {
			$errores["correo"] = "El campo correo es obligatorio";
		} else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			$correo = "";
			$errores["correo"] = "Ingresá un formato de correo válido";
		}

		if ($clave == "") {
			$errores["clave"] = "El campo contraseña es obligatorio";
		} else if (strlen($clave) < 5) {
			$clave = "";
			$errores["clave"] = "La contraseña debe tener 5 letras o más";
		}

		// if (!$errores) {
		if (count($errores) == 0) {

			// Hasheamos la contraseña antes de guardar
			$_POST["clave"] = password_hash($_POST["clave"], PASSWORD_DEFAULT);

			// Levanto el contenido del archivo
			$contenidoDelArchivo = file_get_contents("usuarios.json");

			// Convertimos de JSON a Array
			$listadoDeUsuarios = json_decode($contenidoDelArchivo, true);

			// Pusheamos lo que vino del formulario al array de usuarios
			array_push($listadoDeUsuarios, $_POST);

			// Convertimos a array de los usuarios a formato JSON
			$todoJunto = json_encode($listadoDeUsuarios);

			// var_dump($todoJunto); exit;

			// Insertamos el FORMATO JSON de usuarios en nuestra DB.
			file_put_contents("usuarios.json", $todoJunto);

			// Redirección al salir todo ok
			header("location: exito.php");
			exit;

			// TODO
			// Validar si el archivo de usuarios.json está con datos o si no crearlos
		}

	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
	</head>
	<body>
		<form method="post">
			<div>
				<label>Nombre:</label>
				<input type="text" name="nombre" value="<?php echo $nombre; ?>">
				<?php if ( isset($errores["nombre"]) ): ?>
					<br>
					<span style="color: red;"> <?= $errores["nombre"]; ?> </span>
				<?php endif; ?>
			</div>
			<div>
				<label>Email:</label>
				<input
					type="text"
					name="correo"
					value=<?= isset($correo) ? $correo : "" ; ?>
				>
				<?php if ( isset($errores["correo"]) ): ?>
					<br>
					<span style="color: red;"> <?= $errores["correo"]; ?> </span>
				<?php endif; ?>
			</div>
			<div>
				<label>Contraseña:</label>
				<input type="password" name="clave" value="<?php echo $clave; ?>">
				<?php if ( isset($errores["clave"]) ): ?>
					<br>
					<span style="color: red;"> <?= $errores["clave"]; ?> </span>
				<?php endif; ?>
			</div>
			<button type="submit">Registrarse</button>
		</form>
	</body>
</html>
