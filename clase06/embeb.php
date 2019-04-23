<?php
	$personas = ["Ana", "Clara", "Mauro", "Juanita"];
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>PHP embebido</title>
	</head>
	<body>
		<h2>Listado de personas</h2>
		<ul>
			<?php foreach ($personas as $persona): ?>
				<li><?= $persona; ?></li>
			<?php endforeach; ?>
		</ul>
	</body>
</html>
