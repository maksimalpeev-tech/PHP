<?php
declare(strict_types=1);
/*
ЗАДАНИЕ 1
- Создайте массив $leftMenu элементами которого будут являться ассоциативные массивы с ключами 'link' и 'href'
*/
$leftMenu = [
	['link' => 'Домой', 'href' => 'index.php'],
	['link' => 'О нас', 'href' => 'about.php'],
	['link' => 'Контакты', 'href' => 'contact.php'],
	['link' => 'Таблица умножения', 'href' => 'table.php'],
	['link' => 'Калькулятор', 'href' => 'calc.php']
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню</title>
</head>
<body>
	<h1>Меню</h1>
	<nav>
	<?php
	/*
	ЗАДАНИЕ 2
	- Отрисуйте вертикальное меню с помощью цикла foreach...
	*/
	echo "<ul class=\"menu\">\n";
	foreach ($leftMenu as $item) {
		echo "\t<li><a href='" . htmlspecialchars($item['href']) . "'>" . htmlspecialchars($item['link']) . "</a></li>\n";
	}
	echo "</ul>\n";
	?> 
	</nav>
</body>
</html>