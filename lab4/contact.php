<h3>Адрес</h3>
<p>123456 Москва, Малый Американский переулок 21</p>
<h3>Задайте вопрос</h3>
<form method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
	<p>Тема письма: <input type="text" name="subject"></p>
	<p>Содержание: <textarea name="message" rows="5" cols="40"></textarea></p>
	<p><button type="submit">Отправить</button></p>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['subject'])) {
    echo '<p><b>Сообщение отправлено. Тема: ' . htmlspecialchars($_POST['subject']) . '</b></p>';
}
?>