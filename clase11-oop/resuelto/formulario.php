<?php

	require_once "autoload.php";

	if ($_POST) {
		if ($_POST["tipoUsuario"] == "docente") {
			$user = new Docente($_POST["nombreCompleto"], $_POST["fechaNacimiento"]);
		} else {
			$user = new Alumno($_POST["nombreCompleto"], $_POST["fechaNacimiento"]);
		} 
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Crear Alumas/os ó Docentes</title>
	</head>
	<body>
		<?php if ( !isset($user) ) : ?>
		<form method="post">
			<div>
				<label>Nombre completo:</label>
				<input type="text" name="nombreCompleto">
			</div>
			<br>
			<div>
				<label>Fecha de nacimiento:</label>
				<input type="date" name="fechaNacimiento">
			</div>
			<br>
			<div>
				<label>Tipo de usuario:</label> <br>
				<label>
					<input type="radio" name="tipoUsuario" value="alumno">
					Alumno
				</label>
				<label>
					<input type="radio" name="tipoUsuario" value="docente">
					Docente
				</label>
			</div>
			<br>
			<button type="submit">Enviar</button>
		</form>

		<?php else : ?>

		<div style="color: crimson">
			<?= $user->presentarse(); ?>
		</div>

		<?php endif;?>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</body>
</html>
