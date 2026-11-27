<?php
declare(strict_types=1);

/**
 * Выполняет арифметическую операцию над двумя числами.
 *
 * @param float  $a  Первое число
 * @param float  $b  Второе число
 * @param string $op Оператор (+, -, *, /)
 * @return float|string Результат или сообщение об ошибке
 */
function calculate(float $a, float $b, string $op): float|string
{
    return match ($op) {
        '+' => $a + $b,
        '-' => $a - $b,
        '*' => $a * $b,
        '/' => $b != 0 ? $a / $b : 'Ошибка: деление на 0',
        default => 'Неизвестный оператор',
    };
}

/* ЗАДАНИЕ 1 */
$result = null;
$num1 = $num2 = '';
$operator = '+';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1     = trim($_POST['num1'] ?? '');
    $num2     = trim($_POST['num2'] ?? '');
    $operator = $_POST['operator'] ?? '+';

    if ($num1 !== '' && $num2 !== '' && is_numeric($num1) && is_numeric($num2)) {
        $a = (float) $num1;
        $b = (float) $num2;
        $result = calculate($a, $b, $operator);
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
</head>
<body>

<h1>Калькулятор</h1>

<?php
/* ЗАДАНИЕ 2 */
if ($result !== null) {
    echo '<p><b>Результат: ' . htmlspecialchars($num1) . ' ' . htmlspecialchars($operator) . ' ' . htmlspecialchars($num2) . ' = ' . htmlspecialchars((string)$result) . '</b></p>';
}
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" value="<?= htmlspecialchars($num1) ?>" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" <?= $operator === '+' ? 'selected' : '' ?>>+</option>
    <option value="-" <?= $operator === '-' ? 'selected' : '' ?>>-</option>
    <option value="*" <?= $operator === '*' ? 'selected' : '' ?>>*</option>
    <option value="/" <?= $operator === '/' ? 'selected' : '' ?>>/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" value="<?= htmlspecialchars($num2) ?>" required></p>

<button type="submit">Считать!</button>

</form>

</body>
</html>