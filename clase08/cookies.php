<?php

	echo "<h1>Soy el archivo COOKIES.php</h1>";

	setcookie("usuarioLogeado", "Ana Pérez", time() + 300);
	header("location: vercookie.php");
	exit;

?>
