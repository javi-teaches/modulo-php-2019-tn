<?php

	class Docente extends Usuario implements Presentable
	{
		public function presentarse() {
			return "Hola mi nombre es " . $this->getNombreCompleto() . ", tu docente de FullStack aquí en Digital House. Tengo " . $this->getEdad() . " años.";
		}
	}
