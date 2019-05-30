<?php

	session_start();
	session_destroy();

	setcookie('userLogedEmail', null, time() - 1);

	header('location: index.php');
	exit;
