<?php
	// Incluimos el controlador del registro-login
	// De esta manera tengo el scope a la funciones que necesito
	require_once 'register-login-controller.php';

	$pageTitle = 'Home';
	require_once 'partials/head.php';
?>

	<?php require_once 'partials/navbar.php'; ?>

	<!-- Main-banner -->
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="images/img-banner-01.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="images/img-banner-02.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="images/img-banner-03.jpg" alt="Third slide">
			</div>
		</div>

		<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		</a>
		<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
		</a>

		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
	</div>
	<!-- //Main-banner -->

<?php require_once 'partials/footer.php'; ?>
