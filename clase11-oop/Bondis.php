<?php
	abstract class Bondis {
		public static $precios = [14, 22, 34];

		public static function getPrecio($distancia)
		{
			if ($distancia < 3) {
				return self::$precios[0];
			} elseif ($distancia > 3 && $distancia < 10) {
				return self::$precios[1];
			} else {
				return self::$precios[2];
			}
		}
	}

	var_dump(Bondis::$precios);

	echo "<hr>";

	echo "Si la distancia es de 2km, es precio es: $" .   Bondis::getPrecio(2) . "<br>";
	echo "Si la distancia es de 4km, es precio es: $" .   Bondis::getPrecio(4) . "<br>";
	echo "Si la distancia es de 14km, es precio es: $" .   Bondis::getPrecio(14) . "<br>";
?>
