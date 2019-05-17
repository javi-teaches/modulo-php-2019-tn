<?php
	abstract class Persona {
		protected $nombre;
		protected $apellido;
		protected $email;

		public function __construct($unNombre, $unApellido)
		{
			$this->setNombre($unNombre);
			$this->setApellido($unApellido);
		}

		abstract public function saludar();

		public function setNombre($unNombre) {
			$this->nombre = $unNombre;
		}

		public function getNombre() {
			return $this->nombre;
		}

		public function setApellido($unApellido) {
			$this->apellido = $unApellido;
		}

		public function getApellido() {
			return $this->apellido;
		}

		public function setEmail($unEmail) {
			$this->email = $unEmail;
		}

		public function getEmail() {
			return $this->email;
		}
	}

?>
