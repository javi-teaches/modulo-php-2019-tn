<?php
	if (isset($_POST["firstname"])) {
		echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		echo "Hola " . $_POST["firstname"] . " " . $_POST["lastname"];
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Métodos GET y POST</title>
	</head>
	<body>
		<br>
		<a href="formulario.php?firstname=Ana">Haceme Click</a>

		<!-- <form method="get" action="vergetypost.php">
			<label>Nombre:</label>
			<input type="text" name="firstname">
			<br>
			<label>Apellido:</label>
			<input type="text" name="lastname">
			<br>
			<label>Contraseña:</label>
			<input type="password" name="pass">
			<br>
			<button type="submit">Enviar formulario</button>
		</form> -->

		<form action="vergetypost.php" method="post">
			<label>N1</label>
			<input type="text" name="n1">
			<br>
			<label>N2</label>
			<input type="text" name="n2">
			<br>
			<button type="submit">Enviar</button>
		</form>
	</body>
</html>
