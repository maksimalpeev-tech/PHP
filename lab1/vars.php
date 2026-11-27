<?php
$name = 'Максим';
$age = 20;

$out  = "Меня зовут: $name<br>";
$out .= "Мне $age лет<br>";
$out .= 'Тип переменной $name: ' . gettype($name) . '<br>';
$out .= 'Тип переменной $age: ' . gettype($age) . '<br>';

unset($name, $age);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>
<body>
	<h1>Переменные и вывод</h1>
	<?= $out ?>
</body>
</html>