<?php
declare(strict_types=1);

/**
 * Экранирует строку для безопасного вывода в HTML.
 *
 * @param string $s Исходная строка
 * @return string Экранированная строка
 */
function e(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

/**
 * Отрисовывает таблицу умножения заданного размера.
 *
 * @param int    $cols  Количество столбцов
 * @param int    $rows  Количество строк
 * @param string $color Цвет фона заголовков
 * @return int   Число вызовов функции (static-счётчик)
 */
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int
{
    static $count = 0;
    $count++;

    echo '<table>';
    echo '<caption>Таблица умножения (вызов №' . $count . ')</caption>';
    echo '<tr><th style="background-color: ' . e($color) . ';">×</th>';
    for ($i = 1; $i <= $cols; $i++) {
        echo '<th style="background-color: ' . e($color) . ';">' . $i . '</th>';
    }
    echo '</tr>';
    for ($j = 1; $j <= $rows; $j++) {
        echo '<tr><th style="background-color: ' . e($color) . ';">' . $j . '</th>';
        for ($i = 1; $i <= $cols; $i++) {
            echo '<td>' . ($i * $j) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    return $count;
}

/**
 * Отрисовывает навигационное меню.
 *
 * @param array $menu     Массив пунктов: ['link' => ..., 'href' => ...]
 * @param bool  $vertical true — вертикальное, false — горизонтальное
 * @return void
 */
function getMenu(array $menu, bool $vertical = true): void
{
    echo '<ul' . ($vertical ? '' : ' style="display:flex;gap:10px;list-style:none;"') . '>';
    foreach ($menu as $item) {
        echo '<li><a href="' . e($item['href']) . '">' . e($item['link']) . '</a></li>';
    }
    echo '</ul>';
}