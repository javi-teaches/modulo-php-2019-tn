<?php
	$tituloDelDocumento = "Mi primer archivo de PHP";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title> <?php echo $tituloDelDocumento ?> </title>
	</head>
	<body>
		<h1><?php echo date("Y-m-d"); ?></h1>
		<p>
			<?php
				$nombre = "Julianita";
				$apellido = "González";

				echo $nombre . " " . $apellido;
				echo "<hr>";
				echo "Mi nombre es: $nombre $apellido";
				echo "<hr>";
			?>

			<strong> <?php echo "$nombre $apellido"; ?> </strong>
			<hr>

			<?php
				var_dump($nombre);
			?>
		</p>

		<hr>

		<?php
			$alumnado = ["Pepita", "Juanito", 36, 45.7, true, "Sara"];

			echo "<pre>";
			print_r($alumnado);
			echo "</pre>";

			echo "<hr>";

			echo "<pre>";
			var_dump($alumnado);
			echo "</pre>";

			echo "<hr>";

			$otroArray = ['Hola', ['Juana', 'Sara']];

			echo "<pre>";
			var_dump($otroArray);
			echo "</pre>";

			echo "<hr>";

			$cursoDH = [
				"nombre" => "Desarrollo Fullstack",
				"capacidad" => 42,
				"sede" => "Centro",
				"horarios" => ["Mañana", "Tarde", "Noche"],
				"🙉" => "Estamo' activo"
			];

			$cursoDH[] = "Valor en posición numérico";
			$cursoDH["precio"] = "Mucha guita";

			echo "<pre>";
			var_dump($cursoDH);
			echo "</pre>";

			echo $cursoDH["🙉"];
			echo "<br>";

			echo "Estamos cursando " . $cursoDH["nombre"] . " en la sede " . $cursoDH["sede"] . " y somos " . $cursoDH["capacidad"] . " y estamos cursando a la " . $cursoDH["horarios"][2] ;
		?>


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
