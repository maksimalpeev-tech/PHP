<?php
declare(strict_types=1);

/**
 * Меняет местами значения двух переменных, переданных по ссылке.
 *
 * @param mixed $x Первая переменная
 * @param mixed $y Вторая переменная
 * @return void
 */
$swap = function (mixed &$x, mixed &$y): void {
	$tmp = $x;
	$x = $y;
	$y = $tmp;
};

$a = 5;
$b = 8;
$swap($a, $b);

echo '<pre>';
echo "5 === \$b: " . (5 === $b ? 'true' : 'false') . "\n";
echo "8 === \$a: " . (8 === $a ? 'true' : 'false') . "\n\n";

/**
 * Применяет коллбэк к каждому элементу массива.
 *
 * @param array    $items    Исходный массив
 * @param callable $callback Функция, применяемая к каждому элементу
 * @return array   Новый массив с преобразованными элементами
 */
function map(array $items, callable $callback): array {
	$result = [];
	foreach ($items as $key => $value) {
		$result[$key] = $callback($value);
	}
	return $result;
}

$numbers = [1, 2, 3, 4, 5];
// Передаём стрелочную функцию, возводящую число в квадрат
$squares = map($numbers, fn(int $n): int => $n ** 2);

echo "Квадраты чисел:\n";
print_r($squares);
echo '</pre>';