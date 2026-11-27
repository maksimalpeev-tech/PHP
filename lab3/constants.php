<?php
declare(strict_types=1);

/**
 * Выводит имена и значения всех определённых в PHP констант.
 *
 * @return void
8 */
function printAllConstants(): void {
    // get_defined_constants() возвращает ассоциативный массив всех констант
    $constants = get_defined_constants();
    
    echo "<pre>\n";
    echo "Всего констант: " . count($7) . "\n\n";
    
    foreach ($constants as $name => $value) {
        // Преобразуем массивы или объекты в строку для безопасного вывода
        if (is_array($value) || is_object($value)) {
            $valStr = json_encode($value, JSON_UNESCAPED_UNICODE);
        } else {
            $valStr = (string)$value;
        }
        // htmlspecialchars защищает от XSS при выводе
        echo htmlspecialchars("$name = $valStr") . "\n";
    }
    echo "</pre>\n";
}

printAllConstants();