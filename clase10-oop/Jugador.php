<?php

	class Jugador {
		private $nombre;
		private $avatar;
		private $dinero;
		private $casillero;
		private $listadoDePropiedades;

		public function __construct(string $elNombre, float $elDinero)
		{
			$this->setNombre($elNombre);
			$this->dinero = $elDinero;
		}

		public function setNombre(string $texto)
		{
			// Si el texto es menor a 5 caracteres
			if ( strlen($texto) < 5 ) {
				// Salgo del método
				return false;
			}

			// Si, no entré al IF, voy a setear el nombre que me dan en el parámetro

			$this->nombre = $texto;
		}

		public function getNombre()
		{
			return $this->nombre;
		}
	}

	// Instancia del jugador 1
	$jugador1 = new Jugador("Jua", 345.30);

	echo "<pre>";
	var_dump($jugador1);
	echo "</pre>";

	// Ya no puedo hacer esto, pues el atributo es private
	// $jugador1->nombre = "Juana";

	$jugador1->setNombre("Paola");
	echo "Hola me llamo " . $jugador1->getNombre();

?>
