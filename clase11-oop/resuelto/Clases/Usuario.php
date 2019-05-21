<?php

	abstract class Usuario {
		protected $nombreCompleto;
		protected $fechaNacimiento;
		protected $email;
		protected $documento;
		protected $paisNacimiento;

		public function __construct(string $nombre, string $fecha)
		{
			$this->setNombreCompleto($nombre);
			$this->setFechaNacimiento($fecha);
		}

		public function setNombreCompleto(string $nombre)
		{
			if ( strlen($nombre) > 3) {
				$this->nombreCompleto = $nombre;
			}
		}

		public function getNombreCompleto()
		{
			return $this->nombreCompleto;
		}

		public function setFechaNacimiento(string $fecha)
		{
			$this->fechaNacimiento = $fecha;
		}

		public function getFechaNacimiento()
		{
			return $this->fechaNacimiento;
		}

		public function setEmail(string $email)
		{
			if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
				$this->email = $email;
			}
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function setDocumento(string $documento)
		{
			if ( strlen($documento) <= 8 ) {
				$this->documento = $documento;
			}
		}

		public function getDocumento()
		{
			return $this->documento;
		}

		public function setPaisNacimiento(string $pais)
		{
			$this->paisNacimiento = $pais;
		}

		public function getPaisNacimiento()
		{
			return $this->paisNacimiento;
		}

		public function getEdad()
		{
			return 2019 - substr($this->getFechaNacimiento(), 0, 4);
		}
	}
