<?php

	abstract class SaveImage
	{

	public static $avatarName;

		public static function uploadImage($image)
		{
			// Obtengo la extensión del archivo
			$ext = pathinfo($image['name'], PATHINFO_EXTENSION);

			// Obtengo el archivo temporal
			$tempFile = $image['tmp_name'];

			// Armo el nombre de la imagen
			$finalName = uniqid('img_') . '.' . $ext;

			// Destino final (NO OLVIDAR DAR LOS PERMISOS A LA CARPETA EN NUESTRO D.D.)
			$finalPath = IMAGE_PATH . $finalName;

			// Guardamos la imagen en nuestra carpeta
			move_uploaded_file($tempFile, $finalPath);

			// Retorno el nombre de la imagen para poder guardar el mismo en el JSON
			self::$avatarName = $finalName;
		}
	}
