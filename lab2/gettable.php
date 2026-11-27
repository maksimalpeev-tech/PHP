<?php
declare(strict_types=1);

/**
 * Отрисовывает таблицу умножения заданного размера и цвета заголовка.
 *
 * @param int    $cols  Количество столбцов (по умолчанию 10)
 * @param int    $rows  Количество строк (по умолчанию 10)
 * @param string $color Цвет фона заголовков (по умолчанию 'yellow')
 * @return int   Общее количество вызовов функции
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int {
	static $count = 0;
	$count++;
	
	echo "<table>";
	echo "<caption style='font-weight: bold; margin-bottom: 10px;'>Таблица умножения (вызов №$count)</caption>";
	
	echo "<tr>";
	echo "<th style='background-color: $color;'>×</th>";
	for ($i = 1; $i <= $cols; $i++) {
		echo "<th style='background-color: $color;'>$i</th>";
	}
	echo "</tr>";
	
	for ($j = 1; $j <= $rows; $j++) {
		echo "<tr>";
		echo "<th style='background-color: $color;'>$j</th>";
		for ($i = 1; $i <= $cols; $i++) {
			echo "<td>" . ($i * $j) . "</td>";
		}
		echo "</tr>";
	}
	
	echo "</table>";
	echo "<p>Вызов функции №$count</p>";
	
	return $count;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Таблица умножения (функция)</title>
	<style>
		table { border: 2px solid black; border-collapse: collapse; margin: 20px 0; }
		th, td { padding: 10px; border: 1px solid black; text-align: center; }
	</style>
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
	echo "<h2>Таблица 10×10 (по умолчанию)</h2>";
	$count1 = getTable();
	
	echo "<h2>Таблица 5×10</h2>";
	$count2 = getTable(5);
	
	echo "<h2>Таблица 7×7</h2>";
	$count3 = getTable(7, 7);
	
	echo "<h2>Таблица 8×6 с синим заголовком</h2>";
	$count4 = getTable(8, 6, 'lightblue');
	
	echo "<h3>Общее количество вызовов функции: $count4</h3>";
	?> 
</body>
</html>