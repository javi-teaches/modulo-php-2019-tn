<?php
	echo "<pre>";
	var_dump($_GET);
	echo "</pre>";

	$usuarios = ["Juana", "Arya", "Sansa", "Jon", "Cersey", "Daenerys"];

	if ( isset($_GET["idPersonaje"]) && is_int(intval($_GET["idPersonaje"])) && $_GET["idPersonaje"] < count($usuarios) ) {
			$elegido = $usuarios[$_GET["idPersonaje"]];
	} else {
		$elegido = "";
	}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<h1>Hola <?php echo $elegido; ?></h1>
	</body>
</html>
