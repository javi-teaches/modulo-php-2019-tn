<?php
	function getAllImages() {
		$files = glob(dirname(__FILE__) . '/data/avatars/*.{jpg,gif,png}', GLOB_BRACE);

		foreach ($files as $i => $oneFile) {
			$files[$i] = substr($oneFile, strrpos($oneFile, '/'));
		}

		return $files;
	}

	$images =  getAllImages();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Test</title>
	</head>
	<body>
		<?php foreach ($images as $oneImage): ?>
			<img src="data/avatars<?= $oneImage ?>">
		<?php endforeach; ?>
	</body>
</html>
