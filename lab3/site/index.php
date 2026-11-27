<?php
declare(strict_types=1);
require 'inc/lib.inc.php';
require 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Главная</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<?php require 'inc/top.inc.php'; ?>
	</header>
	<nav>
		<?php require 'inc/menu.inc.php'; ?>
	</nav>
	<section>
		<?php require 'inc/index.inc.php'; ?>
	</section>
	<footer>
		<?php require 'inc/bottom.inc.php'; ?>
	</footer>
</body>
</html>
