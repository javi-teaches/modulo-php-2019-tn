<?php

	$miPassHash = password_hash("hola", PASSWORD_DEFAULT);

	echo $miPassHash;

	echo "<br>";

	var_dump( password_verify("hola", $miPassHash) );

	echo "<hr>";

	$listadoDeUsuarios = file_get_contents("usuarios.json");

	$arrayDeUsuarios = json_decode($listadoDeUsuarios, true);

	foreach ($arrayDeUsuarios as $unUsuario) {
		foreach ($unUsuario as $key => $dato) {
			echo "$key: $dato <br>";
		}
		echo "<br>";
	}

?>
