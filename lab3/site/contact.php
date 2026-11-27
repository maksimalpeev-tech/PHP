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
        $to = 'bergovvv@oreluniver.ru';
        $from = 'admin@center.ogu';
        
        if (sendEmail($to, $subject, $body, $from)) {
            $emailSent = true;
        } else {
            $emailError = 'Ошибка при отправке письма';
        }
    } else {
        $emailError = 'Заполните все поля';
    }
}
?>
<h3>Адрес</h3>
<p>123456 Москва, Малый Американский переулок 21</p>
<h3>Задайте вопрос</h3>

<?php if ($emailSent): ?>
	<p style="color: green;"><b>Сообщение успешно отправлено!</b></p>
<?php endif; ?>

<?php if ($emailError !== ''): ?>
	<p style="color: red;"><b><?=$emailError?></b></p>
<?php endif; ?>

<form method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
	<p>Тема письма: <input type="text" name="subject" required value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>"></p>
	<p>Содержание: <textarea name="body" rows="5" cols="40" required><?= htmlspecialchars($_POST['body'] ?? '') ?></textarea></p>
	<p><button type="submit">Отправить</button></p>
</form>
