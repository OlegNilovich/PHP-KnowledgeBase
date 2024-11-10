<?php

$numbers = [5, 3, 8, 2, 1, 4];

function countingSort($array)
{
    $length = count($array);
    
    // Находим минимальное и максимальное значение в массиве
    $minValue = min($array);
    $maxValue = max($array);
    
    // Создаем массив-счетчик для подсчета количества элементов
    $count = array_fill($minValue, $maxValue - $minValue + 1, 0);
    
    // Подсчитываем количество каждого элемента в массиве
    foreach ($array as $num) {
        $count[$num]++;
    }
    
    // Восстанавливаем отсортированный массив из счетчика
    $sortedArray = [];
    foreach ($count as $num => $countValue) {
        while ($countValue > 0) {
            $sortedArray[] = $num;
            $countValue--;
        }
    }
    
    return $sortedArray;
}

// Пример использования
$numbers = [5, 3, 8, 2, 1, 4];
$sortedNumbers = countingSort($numbers);
print_r($sortedNumbers);
