<?php
	// Incluimos el controlador del registro-login
	// De esta manera tengo el scope a la funciones que necesito
	require_once 'register-login-controller.php';

	// Si no está logueda la persona la redirijo al login
	if ( !isLogged() ) {
		header('location: login.php');
		exit;
	}

	$pageTitle = 'Profile';
	require_once 'partials/head.php';

	$theUser = $_SESSION['userLoged'];
?>
	<?php require_once 'partials/navbar.php'; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<br>
				<h2>Hi <?= $theUser['name']; ?></h2>
				<img src="data/avatars/<?= $theUser['avatar']; ?>" alt="imagen usuario">
				<br><br>
				<a href="#" class="btn btn-info"><?= $theUser['email']; ?></a>
			</div>
		</div>
	</div>

<?php require_once 'partials/footer.php'; ?>
