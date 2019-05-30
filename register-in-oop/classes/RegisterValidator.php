<?php

	class RegisterValidator extends Validator
	{
		private $name;
		private $email;
		private $password;
		private $rePassword;
		private $country;
		private $avatar;

		public function __construct()
		{
			$this->name = isset($_POST['name']) ? trim($_POST['name']) : null;
			$this->email = isset($_POST['email']) ? trim($_POST['email']) : null;
			$this->password = isset($_POST['password']) ? trim($_POST['password']) : null;
			$this->rePassword = isset($_POST['rePassword']) ? trim($_POST['rePassword']) : null;
			$this->country = isset($_POST['country']) ? $_POST['country'] : null;
			$this->avatar = isset($_FILES['avatar']) ? $_FILES['avatar'] : null;
		}

		public function isValid()
		{
			// Si está vació el atributo: $name
			if ( empty($this->name) ) {
				$this->setError('name', 'El campo nombre no puede estar vacío');
			}

			// Si está vació el atributo: $email
			if ( empty($this->email) ) {
				$this->setError('email', 'El campo email es obligatorio');
			} elseif ( !filter_var($this->email, FILTER_VALIDATE_EMAIL) ) { // Si el atributo $email NO es un formato de email válido
				$this->setError('email', 'Introducí un formato de email válido');
			}

			// Si está vació el atributo: $password
			if ( empty($this->password) ) {
				$this->setError('password', 'El campo password es obligatorio');
			}

			// Si está vació el atributo: $rePassword
			if ( empty($this->rePassword) ) {
				$errors['rePassword'] = 'El campo repetir password es obligatorio';
				$this->setError('rePassword', 'El campo repetir password es obligatorio');
			} elseif ($this->password != $this->rePassword) { // Si el valor de los atributos $password y $rePassword son distintos
				$this->setError('password', 'Las contraseñas no coinciden');
				$this->setError('rePassword', 'Las contraseñas no coinciden');
			}

			// Si está vació el atributo: $country
			if ( empty($this->country) ) {
				$this->setError('country', 'Elegí un país');
			}

			// Si no cargaron ningún archivo
			if ( $this->avatar['error'] != UPLOAD_ERR_OK ) {
				$this->setError('avatar', 'Subí una imagen');
			} else {
				// Si cargaron algún archivo, obtengo su extensión
				$ext = pathinfo($this->avatar['name'], PATHINFO_EXTENSION);

				// Si la extesnión del archivo que cargaron NO está en mi array de formatos permitidos
				if ( !in_array($ext, ALLOWED_IMAGE_FORMATS) ) {
					$this->setError('avatar', 'Los formatos permitidos son JPG, PNG y GIF');
				}
			}

			// Finalmente retornamos si la validación es válida
			return empty($this->getAllErrors());
		}

		public function getName() {
			return $this->name;
		}

		public function getEmail() {
			return $this->email;
		}

		public function getcountry() {
			return $this->country;
		}

	}
