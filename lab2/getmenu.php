<?php
declare(strict_types=1);

$leftMenu = [
	['link' => 'Домой', 'href' => 'index.php'],
	['link' => 'О нас', 'href' => 'about.php'],
	['link' => 'Контакты', 'href' => 'contact.php'],
	['link' => 'Таблица умножения', 'href' => 'table.php'],
	['link' => 'Калькулятор', 'href' => 'calc.php']
];

/**
 * Отрисовывает навигационное меню (вертикальное или горизонтальное).
 *
 * @param array $menu     Ассоциативный массив с ключами 'link' и 'href'
 * @param bool  $vertical true для вертикального меню, false для горизонтального (по умолчанию true)
 * @return void
 */
function getMenu(array $menu, bool $vertical = true): void {
	$class = $vertical ? 'menu vertical' : 'menu horizontal';
	
	echo "<ul class='$class'>\n";
	foreach ($menu as $item) {
		echo "\t<li><a href='" . htmlspecialchars($item['href']) . "'>" . htmlspecialchars($item['link']) . "</a></li>\n";
	}
	echo "</ul>\n";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Меню (функция)</title>
	<style>
		.menu { list-style-type: none; margin: 0; padding: 0; }
		.vertical li { margin: 5px 0; padding: 5px; background-color: #f0f0f0; border: 1px solid #ddd; }
		.horizontal li { display: inline-block; margin: 0 10px; padding: 5px 10px; background-color: #f0f0f0; border: 1px solid #ddd; }
		.menu a { text-decoration: none; color: #333; font-weight: bold; }
		.menu a:hover { color: #007bff; }
	</style>
</head>
<body>
	<h1>Меню</h1>
	<?php
	echo "<h2>Вертикальное меню</h2>";
	getMenu($leftMenu);
	
	echo "<h2>Горизонтальное меню</h2>";
	getMenu($leftMenu, false);
	?> 
</body>
</html>