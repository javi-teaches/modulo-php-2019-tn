<?php

	require_once 'autolad.php';

	// Si está logueda la persona la redirijo al profile
	if ( !$Auth->isLogged() ) {
		header('location: login.php');
		exit;
	}

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

	// Traemos al usuario logueado
	$theUser = $_SESSION['userLoged'];

	// Creamos esta variable con Array vacío para que no de error al entrar por GET
	$errorsInEdit = [];

	// Variables para persitir
	$name = $theUser['name'];
	$email = $theUser['email'];
	$userCountry = $theUser['country'];

	if ($_POST) {
		// Las variables de persistencia les asigno el valor que vino de $_POST
		$name = trim($_POST['name']);
		$email = $theUser['email'];
		$userCountry = $_POST['country'];

		// Guardo la imagen y obtengo el nombre aleatorio creado
		$imgName = saveImage();

		// Creo en $_POST una posición "avatar" para guardar el nombre de la imagen
		$_POST['avatar'] = $imgName;

		// Guardo al usuario editado y lo guardo en la variable $userEdited para re-loguearlo
		$userEdited = editUser($email);

		// Logueo al usuario
		login($userEdited);

		// TODO: Falta validar el formulario de edición
	}

	$pageTitle = 'Edit your data';
	require_once 'partials/head.php';

	require_once 'partials/navbar.php';
?>

	<!-- Register-Form -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<div class="row justify-content-center">
			<div class="col-md-10">

				<h2>Edita tu información</h2>

				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Nombre completo:</b></label>
								<input
									type="text"
									name="name"
									class="form-control <?= isset($errorsInEdit['name']) ? 'is-invalid' : null ?>"
									value="<?= $name; ?>"
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInEdit['name']) ? $errorsInEdit['name'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Correo electrónico:</b></label>
								<input
									type="text"
									name="email"
									class="form-control <?= isset($errorsInEdit['email']) ? 'is-invalid' : null ?>"
									value="<?= $email; ?>"
									readonly
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInEdit['email']) ? $errorsInEdit['email'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Password:</b></label>
								<input
									type="password"
									name="password"
									class="form-control <?= isset($errorsInEdit['password']) ? 'is-invalid' : null ?>"
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInEdit['password']) ? $errorsInEdit['password'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Repetir Password:</b></label>
								<input
									type="password"
									name="rePassword"
									class="form-control <?= isset($errorsInEdit['rePassword']) ? 'is-invalid' : null; ?>"
								>
								<div class="invalid-feedback">
          				<?= isset($errorsInEdit['rePassword']) ? $errorsInEdit['rePassword'] : null; ?>
        				</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>País de nacimiento:</b></label>
								<select
									name="country"
									class="form-control <?= isset($errorsInEdit['country']) ? 'is-invalid' : null; ?>"
								>
									<option value="">Elegí un país</option>
									<?php foreach ($countries as $code => $country): ?>
										<option
											value="<?= $code ?>"
											<?= $code == $userCountry ? 'selected' : null; ?>
										>
											<?= $country ?>
										</option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback">
          				<?= isset($errorsInEdit['country']) ? $errorsInEdit['country'] : null; ?>
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
										class="custom-file-input <?= isset($errorsInEdit['avatar']) ? 'is-invalid' : null; ?>"
									>
									<label class="custom-file-label">Choose file...</label>
									<div class="invalid-feedback">
	          				<?= isset($errorsInEdit['avatar']) ? $errorsInEdit['avatar'] : null; ?>
	        				</div>
								</div>
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-warning">Editar información</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //Register-Form -->

<?php require_once 'partials/footer.php'; ?>
