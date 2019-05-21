<?php
	require_once "Clases/Usuario.php";

	class Alumno extends Usuario implements Presentable
	{
		public function presentarse() {
			return "Hola mi nombre es " . $this->getNombreCompleto() . ", soy alumno de FullStack en Digital House y tengo " . $this->getEdad() . " años.";
		}
	}
