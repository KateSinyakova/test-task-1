<?php

function generateArray(int $count = 200000, int $min = -10000, int $max = 10000): array
{
    return array_map(function () use ($min, $max) {
        return rand($min, $max);
    }, range(1, $count));
}

function bubbleSort(array $arr): array
{
    $n = count($arr);
    $swapped = true;

    while ($swapped) {
        $swapped = false;
        for ($i = 1; $i < $n; $i++) {
            if ($arr[$i - 1] > $arr[$i]) {
                [$arr[$i - 1], $arr[$i]] = [$arr[$i], $arr[$i - 1]];
                $swapped = true;
            }
        }
        $n--;
    }
    return $arr;
}

// Тест пузырьковой сортировки сделаю на  1000 элементов
// Потому что такая сортировка юужет сортировать массив 200тыс + очень много времени
$arrSmall = generateArray(1000);
$count = count($arrSmall);
echo "Количество элементов: " . $count . PHP_EOL;
$start = microtime(true);
$sortedSmall = bubbleSort($arrSmall);
$end = microtime(true);
echo "Пузырьковая сортировка лементов: " . round($end - $start, 4) . " секунд\n";

// Сравним со встроенной сортировкой sort(). Тут отсортируем все 200тыс +  элементов
// Она намного более эффективна для сортировки больших массивов
$arrBig = generateArray();
$count = count($arrBig);
echo "Количество элементов: " . $count . PHP_EOL;
$start = microtime(true);
sort($arrBig);
$end = microtime(true);
echo "Встроенная сортировка элементов: " . round($end - $start, 4) . " секунд\n";
