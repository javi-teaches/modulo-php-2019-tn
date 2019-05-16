<?php
	require_once 'Usuario.php';

	$juanita = new Usuario('Juani', '25/05/1992', 'juani@dh.com', 'hola123');
	$pedrito = new Usuario('Peter', '12/01/1980', 'peter@email.com', '12345');
	echo "<br>";

	echo "<pre>";
	var_dump($pedrito);
	echo "</pre>";

	echo $juanita->getEmail();
	echo "<br>";
  echo $juanita->getNombre();
  echo $juanita->setEdad(35);
  echo $juanita->getEdad();
	echo "<br>";
  echo $juanita->getEdad();
	echo "<br>";
	echo $pedrito->getEmail();
	echo "<br>";
	echo $pedrito->getFechaDeNacimiento();
?>
