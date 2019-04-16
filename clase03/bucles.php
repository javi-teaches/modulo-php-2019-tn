<?php
	// for
	for ($i = 1; ($i * 2) <= 14; $i++) {
		if (($i * 2) === 8) {
			break;
		}
		echo "$i x 2 = " . ($i * 2) . "<br>";
	}

	echo "<hr>";

	// while
	$a = 1;
	while ($a <= 10) {
		if (($a * 5) === 15) {
			$a++;
			continue;
		}
		echo "$a x 5 = " . ($a * 5) . "<br>";
		$a++;
	}

	echo "<hr>";

	// do - while
	$n = 100;
	do {
		echo "$n x 3 = " . ($n * 3) . "<br>";
		$n++;
	} while ($n <= 10);

	echo "<hr>";

	// foreach
	$alumnas = ["Juana", "Maria", "Ángeles"];
	foreach ($alumnas as $alumna) {
		echo "$alumna <br>";
	}

	echo "<hr>";

	$computadora = [
		"marca" => "BGH",
		"ram" => "16GB",
		"disco_duro" => "326 SSD",
		"pantalla" => "13 pulgadas"
	];
	foreach ($computadora as $caracteristica => $valor) {
		echo "$caracteristica: $valor <br>";
	}

	echo "<hr>";

	// Utilizando un ​while​ haremos un script que tire una moneda (seleccionará un número al azar que puede ser 0 o 1) hasta que saque 5 veces cara (el número 1). Al terminar, debe imprimir cuántos tiros de monedas llevó obtener 5 veces cara.

	$cantidadDeLanzamientos = 1;
	$caras = 0;

	do {
		$moneda = rand(0, 1);

		echo "<b>Intento - $cantidadDeLanzamientos</b>: <i>Salió $moneda</i> <br>";

		if ($moneda === 1) {
			$caras++;
		}

		$cantidadDeLanzamientos++;
	} while ($caras < 5);

	echo "Se tomaron " . ($cantidadDeLanzamientos - 1) . " veces para sacar 5 veces cara.";

	echo "<hr>";

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

	foreach ($paises as $pais => $datos) {
		if ($datos["esAmericano"] === true) {
			echo "Las ciudades de $pais son: <br>";
				echo "<ul>";
				foreach ($datos["ciudades"] as $ciudad) {
					echo "<li> $ciudad </li>";
				}
				echo "</ul>";
		}
	}

	// foreach ($paises as $pais => $datos) {
	// 	echo "Las ciudades de $pais son: <br>";
	// 	echo "<ul>";
	// 	foreach ($datos["ciudades"] as $ciudad) {
	// 		echo "<li> $ciudad </li>";
	// 	}
	// 	echo "</ul>";
	// }
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
