<?php

	require_once 'autoload.php';

	// Si no está logueda la persona la redirijo al login
	if ( !$Auth->isLogged() ) {
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
				<h2>Hi <?= $theUser->getName(); ?></h2>
				<img src="data/avatars/<?= $theUser->getAvatar(); ?>" alt="imagen usuario">
				<br><br>
				<a href="#" class="btn btn-info"><?= $theUser->getEmail(); ?></a>
				<a href="edit-profile.php" class="btn btn-danger">Editar información</a>
			</div>
		</div>
	</div>

<?php require_once 'partials/footer.php'; ?>
