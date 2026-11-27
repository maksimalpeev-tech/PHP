<?php
declare(strict_types=1);

/**
 * Перемещает загруженный файл в целевую директорию с хеш-именем.
 *
 * @param array  $file       Данные из $_FILES
 * @param string $targetDir  Целевая директория
 * @return bool|string       Путь к файлу или false при ошибке
 */
function moveUploadedFile(array $file, string $targetDir): bool|string
{
    $hash = hash_file('sha256', $file['tmp_name']);
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = $hash . '.' . $ext;
    $targetPath = rtrim($targetDir, '/') . '/' . $newName;
    
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $targetPath;
    }
    return false;
}

$uploadDir = __DIR__ . '/upload';
$uploadInfo = '';

/* ЗАДАНИЕ */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload']) && $_FILES['fupload']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['fupload'];
    
    $uploadInfo = '<p><b>Имя файла:</b> ' . htmlspecialchars($file['name']) . '</p>';
    $uploadInfo .= '<p><b>Размер:</b> ' . $file['size'] . ' байт</p>';
    $uploadInfo .= '<p><b>Временный файл:</b> ' . htmlspecialchars($file['tmp_name']) . '</p>';
    $uploadInfo .= '<p><b>Тип:</b> ' . htmlspecialchars(mime_content_type($file['tmp_name'])) . '</p>';
    $uploadInfo .= '<p><b>Код ошибки:</b> ' . $file['error'] . '</p>';
    
    $mimeType = mime_content_type($file['tmp_name']);
    
    if ($mimeType === 'image/jpeg') {
        $result = moveUploadedFile($file, $uploadDir);
        if ($result !== false) {
            $uploadInfo .= '<p style="color: green;"><b>Файл успешно загружен:</b> ' . htmlspecialchars(basename($result)) . '</p>';
        } else {
            $uploadInfo .= '<p style="color: red;"><b>Ошибка при перемещении файла</b></p>';
        }
    } else {
        $uploadInfo .= '<p style="color: orange;"><b>Файл не является JPEG. Загрузка отменена.</b></p>';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadInfo = '<p style="color: red;"><b>Ошибка загрузки файла. Код ошибки: ' . ($_FILES['fupload']['error'] ?? 'неизвестно') . '</b></p>';
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Загрузка файла на сервер</title>
</head>
<body>
	<div>
		<?=$uploadInfo?>
	</div>
	<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<p>
			<input type="hidden" name="MAX_FILE_SIZE" value="10485760">
			<input type="file" name="fupload" required><br>
			<button type="submit">Загрузить</button>
		</p>
	</form>
</body>
</html>