<?php

	session_start();

	echo "<h1>Soy el archivo VERCOOKIE.php</h1>";

	function myDump($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}

	myDump($_COOKIE);
	echo "<hr>";
	myDump($_SESSION);
?>
