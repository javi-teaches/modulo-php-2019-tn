<?php

	// Inicio la sesión
	session_start();

	// Definimos las constantes que necesitamos en nuestro proyecto
	define('ALLOWED_IMAGE_FORMATS', ['jpg', 'jpeg', 'png', 'gif']);
	define('IMAGE_PATH', dirname(__FILE__) . '/data/avatars/');
	define('USERS_JSON_PATH', dirname(__FILE__) . '/data/users.json');

	// Función para validar el Registro
	/*
		No le pasamos parámetros pues usamos las variables
		super globales $_POST y $FILES
	*/
	function registerValidate(){
		$errors = [];

		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$rePassword = trim($_POST['rePassword']);
		$country = $_POST['country'];
		$avatar = $_FILES['avatar'];

		if ( empty($name) ) {
			$errors['name'] = 'El campo nombre no puede estar vacío';
		}

		if ( empty($email) ) {
			$errors['email'] = 'El campo email es obligatorio';
		} elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
			$errors['email'] = 'Introducí un formato de email válido';
		}
		// TODO -> verificar que el email no esté registrado

		if ( empty($password) ) {
			$errors['password'] = 'El campo password es obligatorio';
		}

		if ( empty($rePassword) ) {
			$errors['rePassword'] = 'El campo repetir password es obligatorio';
		} elseif ($password != $rePassword) {
			$errors['password'] = 'Las contraseñas no coinciden';
			$errors['rePassword'] = 'Las contraseñas no coinciden';
		}

		if ( empty($country) ) {
			$errors['country'] = 'Elegí un país';
		}

		if ( $avatar['error'] != UPLOAD_ERR_OK ) {
			$errors['avatar'] = 'Subí una imagen';
		} else {
			$ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);

			if ( !in_array($ext, ALLOWED_IMAGE_FORMATS) ) {
				$errors['avatar'] = 'Los formatos permitidos son JPG, PNG y GIF';
			}
		}

		return $errors;
	}

	// Función para guardar la imagen
	function saveImage() {
		// Obtengo la extensión del archivo
		$ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

		// Obtengo el archivo temporal
		$tempFile = $_FILES['avatar']['tmp_name'];

		// Armo el nombre de la imagen
		$finalName = uniqid('img_') . '.' . $ext;

		// Destino final (NO OLVIDAR DAR LOS PERMISOS A LA CARPETA EN NUESTRO D.D.)
		$finalPath = IMAGE_PATH . $finalName;

		// Guardamos la imagen en nuestra carpeta
		move_uploaded_file($tempFile, $finalPath);

		// Retorno el nombre de la imagen para poder guardar el mismo en el JSON
		return $finalName;
	}

	// Función para generar un ID
	function generateID() {
		$allUsers = getAllUsers();

		if ( count($allUsers) == 0) {
			return 1;
		}

		$lastUser = array_pop($allUsers);

		return $lastUser['id'] + 1;
	}

	// Función traer todo del JSON
	function getAllUsers() {
		// Obtengo el contenido del archivo
		$fileContent = file_get_contents(USERS_JSON_PATH);

		// Decodifico el JSON a un array asociativo, importante el "true"
		$allUsers = json_decode($fileContent, true);

		return $allUsers;
	}

	// Función para guardar al usuario
	function saveUser() {
		// Hasheo el password del usuario
		$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

		// Genero el ID y lo guardo en una posición de $_POST llamada "id"
		$_POST['id'] = generateID();

		// Elimino de $_POST la posición "rePassword"
		unset($_POST['rePassword']);

		// En la variable $finalUser guardo el array de $_POST
		$finalUser = $_POST;

		// Obtengo todos los usuarios
		$allUsers = getAllUsers();

		// Inserto en la última posición del array al usuario nuevo
		$allUsers[] = $finalUser;

		// Guardo todos los usuarios de vuelta en el JSON
		file_put_contents(USERS_JSON_PATH, json_encode($allUsers));

		return $finalUser;
	}

	// Función para loguear al usuario
	function login($user) {
		unset($user['password']);
		$_SESSION['userLoged'] = $user;
		header('location: profile.php');
		exit;
	}

	// Función para saber si está logueado la/el usuaria/o
	function isLogged() {
		return isset($_SESSION['userLoged']);
	}

	// Función par hacer debug
	function debug($dato) {
		echo "<pre>";
		var_dump($dato);
		echo "</pre>";
		exit;
	}
