<?php
declare(strict_types=1);

/**
 * Записывает данные пользователя в текстовый файл.
 *
 * @param string $filename Имя файла
 * @param string $data     Строка для записи
 * @return bool Успешность записи
 */
function writeToFile(string $filename, string $data): bool
{
    return file_put_contents($filename, $data . PHP_EOL, FILE_APPEND) !== false;
}

/* ЗАДАНИЕ 1 */
define('FILE_NAME', __DIR__ . '/db/users.txt');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = htmlspecialchars(strip_tags(trim($_POST['fname'] ?? '')), ENT_QUOTES, 'UTF-8');
    $lname = htmlspecialchars(strip_tags(trim($_POST['lname'] ?? '')), ENT_QUOTES, 'UTF-8');
    
    if ($fname !== '' && $lname !== '') {
        $line = $fname . ' ' . $lname;
        writeToFile(FILE_NAME, $line);
        
        // Перезапрос страницы (PRG паттерн)
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?=$_SERVER['PHP_SELF']?>">

Имя: <input type="text" name="fname" required><br>
Фамилия: <input type="text" name="lname" required><br>

<br>

<input type="submit" value="Отправить!">

</form>

<?php
/* ЗАДАНИЕ 2 */
if (file_exists(FILE_NAME)) {
    $lines = file(FILE_NAME, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    echo '<hr><pre>';
    foreach ($lines as $num => $line) {
        echo ($num + 1) . ' ' . htmlspecialchars($line) . '<br>';
    }
    echo '</pre>';
    
    echo '<p>Размер файла: ' . filesize(FILE_NAME) . ' байт</p>';
}
?>

</body>
</html>