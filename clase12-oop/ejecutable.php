<?php

	namespace Front;

	echo "Estoy en el namespace " . __NAMESPACE__ . "<br>";

	require_once "Admin/User.php";
	require_once "Blog/User.php";

	use Project\Admin;
	// use Project\Admin as ADM;
	use Project\Blog;

	$userAdmin = new Admin\User();
	// $userAdmin = new ADM\User();
	$userBlog = new Blog\User();

	var_dump($userAdmin);
	echo "<br>";
	var_dump($userBlog);
	echo "<br>";

	echo $userAdmin->sayHello();
	echo "<br>";
	echo $userBlog->sayHello();
	echo "<br>";
	echo $userAdmin->shareThis();
	echo "<br>";
	echo $userAdmin->deleteThis();
