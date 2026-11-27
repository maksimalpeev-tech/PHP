<?php
declare(strict_types=1);

/**
 * Отправляет email с заданными параметрами.
 *
 * @param string $to      Адрес получателя
 * @param string $subject Тема письма
 * @param string $body    Содержание письма
 * @param string $from    Адрес отправителя
 * @return bool Успешность отправки
 */
function sendEmail(string $to, string $subject, string $body, string $from): bool
{
    $headers = "From: $from\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    return mail($to, $subject, $body, $headers);
}

$emailSent = false;
$emailError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = trim(strip_tags($_POST['subject'] ?? ''));
    $body = trim(strip_tags($_POST['body'] ?? ''));
    
    if ($subject !== '' && $body !== '') {
        if (@sendEmail('bergovvv@oreluniver.ru', $subject, $body, 'admin@center.ogu')) {
            $emailSent = true;
        } else {
            $emailError = 'Ошибка при отправке письма';
        }
    } else {
        $emailError = 'Заполните все поля';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Контакты</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<header>
		<img class="logo" src="img/elephant.png" alt="PHP">
		<div class="slogan">приходите к нам учиться</div>
	</header>
	<nav>
		<h2>Навигация по сайту</h2>
		<ul>
			<li><a href="index.php">Домой</a></li>
			<li><a href="index.php?id=about">О нас</a></li>
			<li><a href="index.php?id=contact">Контакты</a></li>
			<li><a href="index.php?id=table">Таблица умножения</a></li>
			<li><a href="index.php?id=calc">Калькулятор</a></li>
		</ul>
	</nav>
	<section>
		<h1>Обратная связь</h1>
		<h3>Адрес</h3>
		<p>123456 Москва, Малый Американский переулок 21</p>
		<h3>Задайте вопрос</h3>

		<?php if ($emailSent): ?>
			<p style="color:green;"><b>Сообщение успешно отправлено!</b></p>
		<?php endif; ?>
		<?php if ($emailError !== ''): ?>
			<p style="color:red;"><b><?=$emailError?></b></p>
		<?php endif; ?>

		<form method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
			<p>Тема письма: <input type="text" name="subject" required value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>"></p>
			<p>Содержание: <textarea name="body" rows="5" cols="40" required><?= htmlspecialchars($_POST['body'] ?? '') ?></textarea></p>
			<p><button type="submit">Отправить</button></p>
		</form>
	</section>
	<footer>
		<p>© Супер Мега Веб-мастер, 2000 – <?= getdate()['year'] ?></p>
	</footer>
</body>
</html>
