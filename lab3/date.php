<?php
declare(strict_types=1);

/* ЗАДАНИЕ 1 */
$now      = time();
$birthday = mktime(0, 0, 0, 8, 15, 2005);   // свой день рождения
$hour     = getdate()['hours'];

/* ЗАДАНИЕ 2 */
if ($hour >= 0 && $hour < 6) {
    $welcome = 'Доброй ночи';
} elseif ($hour >= 6 && $hour < 12) {
    $welcome = 'Доброе утро';
} elseif ($hour >= 12 && $hour < 18) {
    $welcome = 'Добрый день';
} elseif ($hour >= 18 && $hour <= 23) {
    $welcome = 'Добрый вечер';
} else {
    $welcome = 'Доброй ночи';
}

setlocale(LC_ALL, 'ru_RU.UTF-8', 'ru_RU');

$fmt = new IntlDateFormatter(
    'ru_RU',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    null,
    null,
    "'Сегодня' d MMMM yyyy 'года', EEEE HH:mm:ss"
);
$today = datefmt_format($fmt, $now);

// Ближайший день рождения: в этом году, а если прошёл — в следующем
$bday = mktime(0, 0, 0, (int)date('n', $birthday), (int)date('j', $birthday), (int)date('Y', $now));
if ($bday < $now) {
    $bday = mktime(0, 0, 0, (int)date('n', $birthday), (int)date('j', $birthday), (int)date('Y', $now) + 1);
}
$diff    = $bday - $now;
$days    = intdiv($diff, 86400);
$hours   = intdiv($diff % 86400, 3600);
$minutes = intdiv($diff % 3600, 60);
$seconds = $diff % 60;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<p><?= $welcome ?></p>
	<p><?= e($today) ?></p>
	<p>До моего дня рождения осталось: <b><?= $days ?> д. <?= $hours ?> ч. <?= $minutes ?> мин. <?= $seconds ?> сек.</b></p>
</body>
</html>