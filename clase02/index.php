<?php
	$tituloDelDocumento = "Control de flujos";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title> <?php echo $tituloDelDocumento ?> </title>
	</head>
	<body>
		<?php
			$miArray = ['algooo', 'otro'];

			// count() es como el .length de JS. Cuenta la cantidad de elementos dentro de un array.
			if ( count($miArray) > 0 ) {
				echo "El array tiene datos";
			} else {
				echo "El array NO tiene datos";
			}

			echo "<hr>";

			$curso = "fs";
			$cantidad = 25;

			if ($curso == "fs" && $cantidad > 0) {
				echo "Doy clases";
			}

			echo "<hr>";

			$unaVariable = false;

			if (!$unaVariable) {
				echo "Anda a migraciones!!!";
			}

			echo "<hr>";

			$climaDelDia = "soleado";

			if ($climaDelDia == "lluvioso") {
				echo "Llevá el paraguas";
			} else if ($climaDelDia == "ventoso") {
				echo "Uso un pullover";
			} else if ($climaDelDia == "soleado" || $climaDelDia == "nublado") {
				echo "Está soleado o nublado";
			}

			echo "<hr>";

			// Generar dos variables, una $nombreDeUsuario y $ClaveDeUsuario, ambos strings. Validar que el usuario corresponda a "admin" y la contraseña a "1234". De ser así, que imprima "¡Bienvenido a tu cuenta!", sino, que imprima "Lo sentimos, hay un error de credenciales".

			$nombreDeUsuario = "admin";
			$claveDeUsuario = "1234";

			if ($nombreDeUsuario == "admin" && $claveDeUsuario == "1234") {
				echo "¡Bienvenido a tu cuenta!";
			} elseif ($nombreDeUsuario != "admin" && $claveDeUsuario == "1234") {
				echo "Tenés error de usuario";
			} elseif ($claveDeUsuario != "1234" && $nombreDeUsuario == "admin") {
				echo "Tenés un error de contraseña";
			} else {
				echo "Lo sentimos, los dos datos están errados";
			}

			// a. Modificar al ejercicio anterior, y agregar los else necesarios para poder identificar si el error está en el usuario, la contraseña, o en ambos.

			// Jugar cambiando el valor de las variables $nombreDeUsuario y $ClaveDeUsuario para visualizar los distintos resultados del IF.
			echo "<hr>";

			$edad = 17;

			$esMayor = $edad >= 18 ? "Si es mayor" : "No es mayor";

			echo $esMayor;

			echo "<hr>";

			$colorDeOjos = "Verdes";

			switch ($colorDeOjos) {
				case 'Verdes':
					echo "Los ojos son verdes";
					break;
				case 'Celestes':
					echo "Los ojos son celestes";
					break;
				case 'Negros':
					echo "Los ojos son negros";
					break;
				default:
					echo "No identifico ese color";
					break;
			}
		?>

		<div
			class=<?php echo 2 > 3 ? "claseOK" : "otraCosa" ?>
		>

		</div>

	</body>
</html>
