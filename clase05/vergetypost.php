<?php
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";

	function sumar($n1, $n2){
		return $n1 + $n2;
	}

	echo sumar($_POST["n1"], $_POST["n2"]);
?>
