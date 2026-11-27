<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cols  = abs((int) $_POST['cols']);
    $rows  = abs((int) $_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
}
$cols  = ($cols)  ? $cols  : 10;
$rows  = ($rows)  ? $rows  : 10;
$color = ($color) ? $color : '#ffff00';
?>
<h3>Параметры таблицы</h3>
<form method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
	<p>Столбцов: <input type="number" name="cols" min="1" max="20" value="<?= htmlspecialchars((string)$cols) ?>"></p>
	<p>Строк:    <input type="number" name="rows" min="1" max="20" value="<?= htmlspecialchars((string)$rows) ?>"></p>
	<p>Цвет заголовков: <input type="text" name="color" value="<?= htmlspecialchars($color) ?>"></p>
	<p><button type="submit">Построить</button></p>
</form>
<h3>Таблица</h3>
<?php drawTable($cols, $rows, $color); ?>