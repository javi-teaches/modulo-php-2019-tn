<?php

	class DBJson extends DB
	{
		private $dbName;

		public function __construct($dataBaseName)
		{
			$this->dbName = $dataBaseName;
		}

		public function generateID()
		{
			// Traigo a todos los usuarios
			$allUsers = $this->getAllUsers();

			// Si el conteo del array de usuarios es igual a cero
			if ( count($allUsers) == 0 ) {
				return 1;
			}

			// Si el conteo del array de usuarios es superior a cero, obtengo el último usuario registrado
			$lastUser = array_pop($allUsers);

			// Retorno el ID del último usuario registrado + 1
			return $lastUser['id'] + 1;
		}

		public function getAllUsers(){
			// Obtengo el contenido del archivo JSON
			$fileContent = file_get_contents(USERS_JSON_PATH . $this->dbName);

			// Decodifico el JSON a un array asociativo, importante el "true"
			$allUsers = json_decode($fileContent, true);

			// Retorno el array de usuarios
			return $allUsers;
		}

		public function saveUser(User $oneUser){
			// Obtengo todos los usuarios
			$allUsers = $this->getAllUsers();

			// En la última posición del array de usuarios, inserto al usuario nuevo
			$allUsers[] = $oneUser->getDataInArray();

			// Guardo todos los usuarios de vuelta en el JSON
			file_put_contents(USERS_JSON_PATH . $this->dbName, json_encode($allUsers));
		}

		public function emailExist($email){
			// Traigo a todos los usuarios
			$allUsers = $this->getAllUsers();

			// Recorro el array de usuarios
			foreach ($allUsers as $oneUser) {
				// Si la posición "email" del usuario en la iteración coincide con el email que pasé como parámetro
				if ($oneUser['email'] == $email) {
					return true;
				}
			}

			// Si termino de recorrer el array y no se encontró al email que pasé como parámetro
			return false;
		}

		public function getUserByEmail($email){
			// Obtengo a todos los usuarios
			$allUsers = $this->getAllUsers();

			// Recorro el array de usuarios
			foreach ($allUsers as $oneUser) {
				// Si la posición email del usuario de esa iteración es igual al email que me pasan por parámetro
				if ($oneUser['email'] == $email) {
					// Instanciamos un Usuario
					$theUser = new User($oneUser['name'], $oneUser['email'], $oneUser['country'], $oneUser['avatar'], $oneUser['password']);
					$theUser->setId($oneUser['id']);
					return $theUser;
				}
			}
		}

	}
