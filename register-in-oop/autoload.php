<?php
	require_once 'config.php';
	require_once 'classes/Validator.php';
	require_once 'classes/RegisterValidator.php';
	require_once 'classes/LoginValidator.php';
	require_once 'classes/SaveImage.php';
	require_once 'classes/User.php';
	require_once 'classes/DB.php';
	require_once 'classes/DBJson.php';
	require_once 'classes/Auth.php';

	$DB = new DBJson('users.json');
	$Auth = new Auth($DB);
