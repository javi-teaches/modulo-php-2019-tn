<?php
	// Incluimos el controlador del registro-login
	// De esta manera tengo el scope a la funciones que necesito
	require_once 'register-login-controller.php';

	// Si está logueda la persona la redirijo al profile
	if ( isLogged() ) {
		header('location: profile.php');
		exit;
	}

	$pageTitle = 'Register';
	require_once 'partials/head.php';

	$countries = [
		'ar' => 'Argentina',
		'bo' => 'Bolivia',
		'br' => 'Brasil',
		'co' => 'Colombia',
		'cl' => 'Chile',
		'ec' => 'Ecuador',
		'pa' => 'Paraguay',
		'pe' => 'Perú',
		'uy' => 'Uruguay',
		've' => 'Venezuela',
	];

	// Creamos esta variable con Array vacío para que no de error al entrar por GET
	$errorsInRegister = [];

	// Variables para persitir
	$name = '';
	$email = '';
	$countryFromPost = '';

	if ($_POST) {
		// Las variables de persistencia les asigno el valor que vino de $_POST
		$name = trim($_POST['name']);
		$email = trim($_POST['email']);
		$countryFromPost = $_POST['country'];

		// La función registerValidate() nos retorna el array de errores que almacenamos en esta variable
		$errorsInRegister = registerValidate();

		// Si no hay errores en el registro
		// Cuando no hay errores guardo la imagen y los datos
		// if ( count($errorsInRegister) == 0 ) {
		if ( !$errorsInRegister ) {

			// Guardo la imagen y obtengo el nombre aleatorio creado
			$imgName = saveImage();

			// Creo en $_POST una posición "avatar" para guardar el nombre de la imagen
			$_POST['avatar'] = $imgName;

			// Guardo al usuario en el archivo JSON, y me devuelve al usuario que guardó en array
			$theUser = saveUser();

			// Al momento en que se registar vamos a mantener la sesión abierta
			setcookie('userLoged', $theUser['email'], time() + 3000);

			// Logueo al usuario
			login($theUser);
		}
	}

	require_once 'partials/navbar.php';
?>

	<!-- Register-Form -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<?php if ( count($errorsInRegister) > 0 ): ?>
					<div class="alert alert-danger">
						<ul>
							<?php foreach ($errorsInRegister as $oneError): ?>
								<li> <?= $oneError; ?> </li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>


				<h2>Formulario de registro</h2>

				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Nombre completo:</b></label>
								<input
									type="text"
									name="name"
									class="form-control <?= isset($errorsInRegister['name']) ? 'is-invalid' : null ?>"
									value="<?= $name; ?>"
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInRegister['name']) ? $errorsInRegister['name'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Correo electrónico:</b></label>
								<input
									type="text"
									name="email"
									class="form-control <?= isset($errorsInRegister['email']) ? 'is-invalid' : null ?>"
									value="<?= $email; ?>"
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInRegister['email']) ? $errorsInRegister['email'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Password:</b></label>
								<input
									type="password"
									name="password"
									class="form-control <?= isset($errorsInRegister['password']) ? 'is-invalid' : null ?>"
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInRegister['password']) ? $errorsInRegister['password'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Repetir Password:</b></label>
								<input
									type="password"
									name="rePassword"
									class="form-control <?= isset($errorsInRegister['rePassword']) ? 'is-invalid' : null; ?>"
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInRegister['rePassword']) ? $errorsInRegister['rePassword'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>País de nacimiento:</b></label>
								<select
									name="country"
									class="form-control <?= isset($errorsInRegister['country']) ? 'is-invalid' : null; ?>"
								>
									<option value="">Elegí un país</option>
									<?php foreach ($countries as $code => $country): ?>
										<option
											value="<?= $code ?>"
											<?= $code == $countryFromPost ? 'selected' : null; ?>
										>
											<?= $country ?>
										</option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
          				<?= isset($errorsInRegister['country']) ? $errorsInRegister['country'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Imagen de perfil:</b></label>
								<div class="custom-file">
									<input
										type="file"
									 	name="avatar"
										class="custom-file-input <?= isset($errorsInRegister['avatar']) ? 'is-invalid' : null; ?>"
									>
									<label class="custom-file-label">Choose file...</label>
									<div class="invalid-feedback">
	          				<?= isset($errorsInRegister['avatar']) ? $errorsInRegister['avatar'] : null; ?>
	        				</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary">Registrarse</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //Register-Form -->

<?php require_once 'partials/footer.php'; ?>
