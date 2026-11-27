<p>Он-лайн калькулятор школьника</p>
<form method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
	<p>Число 1: <input type="number" name="num1" step="any" value="<?= htmlspecialchars((string)($_POST['num1'] ?? '')) ?>"></p>
	<p>Оператор:
		<select name="op">
			<?php foreach (['+', '-', '*', '/'] as $o): ?>
				<option value="<?=$o?>" <?= ($o === ($_POST['op'] ?? '+')) ? 'selected' : '' ?>><?=$o?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p>Число 2: <input type="number" name="num2" step="any" value="<?= htmlspecialchars((string)($_POST['num2'] ?? '')) ?>"></p>
	<p><button type="submit">Вычислить</button></p>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num1'], $_POST['num2'], $_POST['op'])) {
    $a = (float) $_POST['num1'];
    $b = (float) $_POST['num2'];
    $op = $_POST['op'];
    $result = match ($op) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $b != 0 ? $a / $b : 'Ошибка: деление на 0',
        default => 'Неизвестный оператор',
    };
    echo '<p><b>Результат: ' . htmlspecialchars((string)$a) . ' ' . htmlspecialchars($op) . ' ' . htmlspecialchars((string)$b) . ' = ' . htmlspecialchars((string)$result) . '</b></p>';
}
?>