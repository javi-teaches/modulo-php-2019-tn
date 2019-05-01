<?php

// si está seteado en $_FILES la posición "avatar"
if (isset($_FILES["avatar"])) {
	// Si el error de subida es igual a 0
	if ($_FILES["avatar"]["error"] === UPLOAD_ERR_OK) {
		// Obtengo el nombre de la imagen
		$nombreDeLaImagen = $_FILES["avatar"]["name"];
		// Del nombre de la imagen obtengo la extensión
		$ext = pathinfo($nombreDeLaImagen, PATHINFO_EXTENSION);

		// Si la extesión de la imagen NO es JPG y NO es png
		if ($ext != "jpg" && $ext != "png") {
			echo "Formato invalido";
		} else {
			// Si se cumple con el formato valido obtenemos el archivo temporal
			$archivoTemporal = $_FILES["avatar"]["tmp_name"];

			// Nos creamos un nombre de imagen único usando la extensión que capturamos
			$nombreImagenFinal = uniqid("img_") . "." . $ext;

			// Definimos el destino en donde se guardará la imagen
			// dirname(__FILE__) nos deja ubicados en la posición de este archivo
			$destino = dirname(__FILE__) . "/avatars/" . $nombreImagenFinal;

			// Subimos finalmente la imagen a donde deseamos
			move_uploaded_file($archivoTemporal, $destino);

			echo "Imagen se subió";
		}
	}
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>subir imagen</title>
</head>

<body>
	<h2>Subir imagen</h2>
	<form method="post" enctype="multipart/form-data">
		<input type="file" name="avatar">
		<button type="submit">Subir</button>
	</form>
</body>

</html>
