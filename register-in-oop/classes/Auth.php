<?php

	class Auth
	{

		public function __construct(DB $DB)
		{
			session_start();

			if ( isset($_COOKIE['userLogedEmail']) && !$this->isLogged() ) {
				// Busco al usuario por el email que tengo almacenado en la cookie
				$theUser = $DB->getUserByEmail($_COOKIE['userLogedEmail']);

				// Guardo en sesión al usuario que busqué anteiormente
				$_SESSION['userLoged'] = $theUser;
			}

		}

		public function login(User $theUser) {
			// Guardo en sesión al usuario que recibo por parámetro OBJETO de tipo USUARIO
			$_SESSION['userLoged'] = $theUser;

			// Redirecciono al perfil del usuario
			header('location: profile.php');
			exit;
		}


		public function isLogged() {
			// El return devuelve true o false, según lo que retorne la función isset()
			return isset($_SESSION['userLoged']);
		}
	}
