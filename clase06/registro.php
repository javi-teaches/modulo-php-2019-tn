<?php
	if ($_POST) {

		$inputUser = trim($_POST["user"]);
		$inputEmail = trim($_POST["email"]);
		$inputPass = trim($_POST["password"]);

		if ( $inputUser === "" ) {
			$errorUser = "Ey, el nombre es obligatorio <br>";
		}

		if ( $inputEmail === "" ) {
			echo "Ey, el email es obligatorio <br>";
		} elseif ( !filter_var($inputEmail, FILTER_VALIDATE_EMAIL) ) {
			echo "Ey, el email debe tener un formato válido <br>";
		}

		if ( $inputPass === "" ) {
			echo "Ey, el password es obligatorio <br>";
		} elseif ( strlen($inputPass) < 5 ) {
			echo "Ey, el password debe tener más de 5 letras <br>";
		}

		if ($inputUser != "" && $inputEmail != "" && $inputPass != "") {
			header("location: welcome.php");
			exit;
		}

	}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
	</head>
	<body>
		<form method="post">
			<div>
				<label>Nombre:</label> <br>
				<input type="text" name="user">
				<?php if ( isset($errorUser) ): ?>
					<span style="color: red"><?= $errorUser; ?></span>
				<?php endif; ?>

			</div>
			<div>
				<label>Email:</label> <br>
				<input type="text" name="email">
			</div>
			<div>
				<label>Contraseña:</label> <br>
				<input type="password" name="password">
			</div>
			<br>
			<button type="submit">Registrarse</button>
		</form>
	</body>
</html>
