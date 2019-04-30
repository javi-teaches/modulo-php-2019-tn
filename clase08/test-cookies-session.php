<?php
	session_start();

	if ( isset($_COOKIE["usuarioLogeado"]) ) {
		$_SESSION["usuarioActual"] = $_COOKIE["usuarioLogeado"];
		echo "Hola" . $_SESSION["usuarioActual"];
	} else {
		echo "Hola invitad@";
	}




?>
