<?php
	$alumnos = [
		["nombre" => "Juana", "email" => "juani@dh.com"],
		["nombre" => "Pedro", "email" => "pedro@email.com"]
	];

	$enFormatoJSON = json_encode($alumnos);

	echo "<pre>";
	var_dump($enFormatoJSON);
	echo "</pre>";

	echo "<hr>";

	$personajes = '[{"nombre": "Ironman", "poder": "Dinero"}, {"nombre": "Hulk", "poder": "ser verde"}]';
	$personajesEnArray = json_decode($personajes, true);

	echo "<pre>";
	var_dump($personajesEnArray);
	echo "</pre>";

	echo $personajesEnArray[0]["nombre"];
?>
