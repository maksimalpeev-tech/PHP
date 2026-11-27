<?php
declare(strict_types=1);

/**
 * Выводит имена всех функций для каждого загруженного модуля 
 * и общее количество функций в конце списка.
 *
 * @return void
 */
function printExtensionFunctions(): void {
    $extensions = get_loaded_extensions();
    $totalFunctions = 0;

    echo "<pre>\n";
    foreach ($extensions as $ext) {
        $funcs = get_extension_funcs($ext);
        
        if ($funcs !== false && is_array($funcs)) {
            $count = count($funcs);
            $totalFunctions += $count;
            
            echo htmlspecialchars("=== Модуль: $ext ($count функций) ===\n");
            foreach ($funcs as $func) {
                echo "  - " . htmlspecialchars($func) . "\n";
            }
            echo "\n";
        }
    }
    
    echo "========================================\n";
    echo "ОБЩЕЕ КОЛИЧЕСТВО ФУНКЦИЙ: $totalFunctions\n";
    echo "</pre>\n";
}

printExtensionFunctions();