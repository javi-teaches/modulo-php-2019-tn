<?php

	class LoginValidator extends Validator
	{

		private $email;
		private $password;

		function __construct()
		{
			$this->email = isset($_POST['email']) ? trim($_POST['email']) : null;
			$this->password = isset($_POST['password']) ? trim($_POST['password']) : null;
		}

		public function isValid() {
			// Si está vacío el atributo: $email
			if ( empty($this->email) ) {
				$this->setError('email', 'El campo email es obligatorio');
			} elseif ( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ) { // Si el campo $email no es un email válido
				$this->setError('email', 'Introducí un formato de email válido');
			}

			// Si está vacío el campo: $password
			if ( empty($this->password) ) {
				$this->setError('password', 'El campo password es obligatorio');
			}

			// Retorno el array de errores con los mensajes de error
			return empty($this->getAllErrors());
		}

		public function getEmail()
		{
			return $this->email;
		}
	}
