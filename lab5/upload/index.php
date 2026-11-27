<?php
declare(strict_types=1);

/**
 * Получает список файлов изображений в директории.
 *
 * @param string $dir Путь к директории
 * @return array Массив имён файлов изображений
 */
function getImages(string $dir): array
{
    $images = [];
    $allowedExts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    
    if (is_dir($dir)) {
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || $file === 'index.php' || $file === '.htaccess') {
                continue;
            }
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($ext, $allowedExts)) {
                $images[] = $file;
            }
        }
    }
    
    return $images;
}

$images = getImages(__DIR__);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Галерея изображений</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 20px;
			background: #f5f5f5;
		}
		h1 {
			text-align: center;
			color: #333;
		}
		.gallery {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
			gap: 20px;
			padding: 20px;
		}
		.gallery-item {
			background: white;
			border-radius: 8px;
			overflow: hidden;
			box-shadow: 0 2px 8px rgba(0,0,0,0.1);
			transition: transform 0.2s;
		}
		.gallery-item:hover {
			transform: translateY(-5px);
			box-shadow: 0 4px 16px rgba(0,0,0,0.2);
		}
		.gallery-item img {
			width: 100%;
			height: 200px;
			object-fit: cover;
			display: block;
		}
		.gallery-item p {
			padding: 10px;
			margin: 0;
			text-align: center;
			font-size: 14px;
			color: #666;
		}
		.empty {
			text-align: center;
			padding: 40px;
			color: #999;
		}
	</style>
</head>
<body>
	<h1>Галерея изображений</h1>
	
	<?php if (empty($images)): ?>
		<p class="empty">В галерее пока нет изображений. Загрузите JPEG-файл через <a href="../upload.php">форму загрузки</a>.</p>
	<?php else: ?>
		<div class="gallery">
			<?php foreach ($images as $img): ?>
				<div class="gallery-item">
					<img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($img) ?>">
					<p><?= htmlspecialchars($img) ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</body>
</html>