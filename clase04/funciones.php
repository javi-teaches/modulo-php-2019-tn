<?php
	$paises = [
		"Argentina" => [
			"esAmericano" => true,
			"ciudades" => ["Buenos Aires", "Córdoba"]
		],
		"Brasil" => [
			"esAmericano" => true,
			"ciudades" => ["Brasilia", "Rio de Janeiro"]
		],
		"Francia" => [
			"esAmericano" => false,
			"ciudades" =>  ["Paris", "Nantes", "Lyon"]
		],
		"Italia" => [
			"esAmericano" => false,
			"ciudades" =>  ["Roma", "Milan", "Venecia"]
		],
		"Alemania" => [
			"esAmericano" => false,
			"ciudades" =>  ["Munich", "Berlin", "Frankfurt"]
		],
		"Colombia" => [
			"esAmericano" => true,
			"ciudades" => ["Cartagena", "Bogota", "Barranquilla"]
		],
	];

	// Función No Paramétrica

	function decirAdios () {
		return "Chau";
	}

	$resultado = decirAdios();
	echo $resultado;
	echo "<br>";
	echo decirAdios();
	echo "<hr>";

	// Función paramétrica
	function saludarPersona($nombre = "Sin nombre", $apellido = "Sin apellido") {
		return "Hola $nombre $apellido";
	}

	echo saludarPersona("Pepita", "Suarez");
	echo "<br>";
	echo saludarPersona();
	echo "<br>";

	echo "Qué lindo día";
	echo "<hr>";

	function sumar ($n1, $n2 = 10) {
		return $n1 + $n2;
	}

	echo sumar(5, 5);
	echo "<br>";
	echo sumar(2);
	echo "<br>";

	$persona = "Juanita Pérez";

	function saludar2 () {
		global $persona;
		$miDato = $persona . " estoy programando.";
		return $miDato;
	}

	echo saludar2();
	echo "<hr>";


	function sumar1 (){
		static $numero = 0;
		if ($numero == 5) {
			$numero = 0;
		}
		return ++$numero;
	}

	echo sumar1();
	echo "<br>";
	echo sumar1();
	echo "<br>";
	echo sumar1();
	echo "<br>";
	echo sumar1();
	echo "<br>";
	echo sumar1();
	echo "<br>";
	echo sumar1();
	echo "<br>";
	echo sumar1();
	echo "<br>";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Funciones</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-6 col-lg-4">
					<h1> <?php echo saludar2(); ?> </h1>
				</div>
			</div>
		</div>

		<?php foreach ($paises as $pais => $datos) : ?>
			<?php if ($datos["esAmericano"] === true) : ?>
				<p>Las ciudades de <?php echo $pais; ?> son:</p>
				<ul>
					<?php foreach ($datos["ciudades"] as $ciudad) : ?>
						<li> <?php echo $ciudad; ?> </li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		<?php endforeach; ?>

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
