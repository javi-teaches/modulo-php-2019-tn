<?php
	require_once 'autoload.php';

	// Si está logueda la persona la redirijo al profile
	if ( $Auth->isLogged() ) {
		header('location: profile.php');
		exit;
	}

	$loginValidator = new LoginValidator;

	if ($_POST) {
		$user = $DB->getUserByEmail($_POST['email']);

		if ( !$user ) {
			$loginValidator->setError('email', 'No hay usuario registrado con ese correo');
		} elseif( !password_verify($_POST['password'], $user->getPassword()) ) {
			$loginValidator->setError('password', 'Error de credenciales');
		}

		if ( $loginValidator->isValid() ) {
			// Preguntamos si quiere ser recordado
			if ( isset($_POST['rememberUser']) ) {
				setcookie('userLogedEmail', $user->getEmail(), time() + 3000);
			}

			$Auth->login($user);
		}
	}

	$pageTitle = 'Login';
	require_once 'partials/head.php';
?>

	<?php require_once 'partials/navbar.php'; ?>

	<!-- Register-Form -->
	<div class="container" style="margin-top:30px; margin-bottom: 30px;">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<?php if ( $_POST && $loginValidator->isValid() == false ): ?>
					<div class="alert alert-danger">
						<ul>
							<?php foreach ($loginValidator->getAllErrors() as $oneError): ?>
								<li> <?php echo $oneError; ?> </li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endif; ?>

				<h2>Formulario de Login</h2>

				<form method="post">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Correo electrónico:</b></label>
								<input
									type="text"
									name="email"
									class="form-control"
									value="<?= $loginValidator->getEmail() ?>"
								>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><b>Password:</b></label>
								<input
									type="password"
									name="password"
									class="form-control"
								>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" name="rememberUser">
									Recordarme
							  </label>
							</div>
							<br>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-primary">Ingresar</button>
							¿Aún no tenés cuenta? <a href="register.php">Registrate</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //Register-Form -->

<?php require_once 'partials/footer.php'; ?>
