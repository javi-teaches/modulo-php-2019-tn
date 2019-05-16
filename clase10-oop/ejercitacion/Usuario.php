<?php

	class Usuario
	{
		private $nombre;
		private $fechaDeNacimiento;
		private $email;
		private $edad;
		private $password;

		public function __construct(string $elNombre, $laFecha, $elEmail, $elPassword)
		{
			$this->setNombre($elNombre);
			$this->fechaDeNacimiento = $laFecha;
			$this->setEmail($elEmail);
			$this->setPassword($elPassword);
		}

		public function getNombre()
		{
			return $this->nombre;
		}

		public function setNombre(string $unNombre)
		{
			$this->nombre = $unNombre;
		}

		public function getEdad()
		{
			return $this->edad;
		}

		public function setEdad(int $laEdad)
		{
			$this->edad = $laEdad;
		}

		public function getFechaDeNacimiento()
		{
			return $this->fechaDeNacimiento;
		}

		public function getEmail()
		{
			return $this->email;
		}

		public function setEmail(string $elEmail)
		{
			if ( filter_var($elEmail, FILTER_VALIDATE_EMAIL) ) {
				$this->email = $elEmail;
				return;
			}

			echo "Lo que me diste NO es un email";
		}

		public function setPassword($elPassword)
		{
			$this->password = password_hash($elPassword, PASSWORD_DEFAULT);
		}
	}
