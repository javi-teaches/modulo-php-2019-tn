<?php
	session_start();

	function myDump($data){
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
	
	myDump($_SESSION);
?>
