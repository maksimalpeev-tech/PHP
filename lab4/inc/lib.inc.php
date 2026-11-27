<?php
declare(strict_types=1);

/**
 * Отрисовывает таблицу умножения.
 * @param int    $cols  Столбцов
 * @param int    $rows  Строк
 * @param string $color Цвет заголовков
 * @return int   Число вызовов
 */
function drawTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int
{
    static $count = 0;
    $count++;
    echo '<table>';
    echo '<caption>Таблица умножения (вызов №' . $count . ')</caption>';
    echo '<tr><th style="background-color:' . htmlspecialchars($color) . ';">×</th>';
    for ($i = 1; $i <= $cols; $i++) {
        echo '<th style="background-color:' . htmlspecialchars($color) . ';">' . $i . '</th>';
    }
    echo '</tr>';
    for ($j = 1; $j <= $rows; $j++) {
        echo '<tr><th style="background-color:' . htmlspecialchars($color) . ';">' . $j . '</th>';
        for ($i = 1; $i <= $cols; $i++) {
            echo '<td>' . ($i * $j) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    return $count;
}

/**
 * Отрисовывает меню навигации.
 * @param array $menu     Пункты ['link'=>..., 'href'=>...]
 * @param bool  $vertical true — вертикальное
 * @return void
 */
function getMenu(array $menu, bool $vertical = true): void
{
    echo '<ul>';
    foreach ($menu as $item) {
        echo '<li><a href="' . htmlspecialchars($item['href']) . '">' . htmlspecialchars($item['link']) . '</a></li>';
    }
    echo '</ul>';
}