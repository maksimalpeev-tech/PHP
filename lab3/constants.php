<?php
declare(strict_types=1);

/**
 * Выводит имена и значения всех определённых в PHP констант.
 *
 * @return void
 */
function printAllConstants(): void
{
    $constants = get_defined_constants();

    echo "<pre>\n";
    echo "Всего констант: " . count($constants) . "\n\n";

    foreach ($constants as $name => $value) {
        if (is_array($value) || is_object($value)) {
            $valStr = json_encode($value, JSON_UNESCAPED_UNICODE);
        } else {
            $valStr = (string)$value;
        }
        echo htmlspecialchars("$name = $valStr") . "\n";
    }
    echo "</pre>\n";
}

printAllConstants();
