<?php
	$productos = [
		[
			"nombre" => "Zapatillas Nike",
			"precio" => 3456,
			"imagen" => "https://loremflickr.com/320/240"
		],
		[
			"nombre" => "Compu BGH",
			"precio" => 14356,
			"imagen" => "https://loremflickr.com/320/240"
		],
		[
			"nombre" => "Celu Motorola",
			"precio" => 346,
			"imagen" => "https://loremflickr.com/320/240"
		],
		[
			"nombre" => "TV Panasonic",
			"precio" => 323456789046,
			"imagen" => "https://loremflickr.com/320/240"
		],
		[
			"nombre" => "Mesita de noche",
			"precio" => 39046,
			"imagen" => "https://loremflickr.com/320/240"
		],
	]
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<title>Listado de productos</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<?php foreach ($productos as $producto): ?>
					<div class="col-12 col-sm-6 col-lg-4">
						<h1 class="text-danger"> <?php echo $producto["nombre"] ?> </h1>
						<img src=<?php echo $producto["imagen"] ?> width="100%">
						<b>$ <?php echo $producto["precio"] ?> </b>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<!-- Sin php embebido -->
		<?php
			echo "<div class='container'>";
				echo "<div class='row'>";
					foreach ($productos as $key => $producto) {
						echo "<div class='col-12 col-sm-6 col-lg-4'>";
							echo "<h1 class='text-danger'>" . $producto["nombre"] . "</h1> ";
							echo "<img src=" . $producto["imagen"] . " width=\"100%\">";
							echo "<b>$" . $producto["precio"] . "</b>";
						echo "</div>";
					}
				echo "</div>";
			echo "</div>";
		?>
	</body>
</html>
