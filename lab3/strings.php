<?php
declare(strict_types=1);

/**
 * Проверяет сложность пароля: длина >= 8, есть заглавная и строчная
 * латинские буквы и хотя бы одна цифра.
 *
 * @param string $password Проверяемый пароль
 * @return bool true, если пароль сложный
 */
function isStrongPassword(string $password): bool
{
    return strlen($password) >= 8
        && preg_match('/[A-Z]/', $password) === 1
        && preg_match('/[a-z]/', $password) === 1
        && preg_match('/[0-9]/', $password) === 1;
}

/* ЗАДАНИЕ 1 */
$login    = ' User ';
$password = 'megaP@ssw0rd';
$name     = 'иван';
$email    = 'ivan@petrov.ru';
$code     = '<?=$login?>';

/* ЗАДАНИЕ 2 */
$login  = strtolower(trim($login));                 // 'user'
$strong = isStrongPassword($password);              // true
// ucfirst() не работает с кириллицей (режет по байтам), поэтому mb_*:
$name   = mb_strtoupper(mb_substr($name, 0, 1, 'UTF-8'), 'UTF-8')
        . mb_substr($name, 1, null, 'UTF-8');       // 'Иван'
$emailOk = filter_var($email, FILTER_VALIDATE_EMAIL) !== false; // true
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Использование функций обработки строк</title>
</head>
<body>
	<h1>Функции обработки строк</h1>
	<p>Логин после trim+strtolower: <b><?= e($login) ?></b></p>
	<p>Пароль «<?= e($password) ?>» сложный: <b><?= $strong ? 'да' : 'нет' ?></b></p>
	<p>Имя с большой буквы: <b><?= e($name) ?></b></p>
	<p>Email корректный: <b><?= $emailOk ? 'да' : 'нет' ?></b></p>
	<p>Значение $code как в коде: <b><?= e($code) ?></b></p>
</body>
</html>