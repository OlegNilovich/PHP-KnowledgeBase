<?php

/*
	Сложность O(n^2)
*/

$numbers = [5, 3, 8, 2, 1];

function insertionSort($array)
{
    $length = count($array); // 5
    
    for ($i = 1; $i < $length; $i++) {
        $key = $array[$i]; // 3
        $j = $i - 1;       // 0
        
        // Перемещаем элементы большие чем $key вперед
        while ($j >= 0 && $array[$j] > $key) {
            $array[$j + 1] = $array[$j];
            $j = $j - 1;
        }
        
        $array[$j + 1] = $key;
    }
    
    return $array;
}

// Пример использования
$numbers = [5, 3, 8, 2, 1];
$sortedNumbers = insertionSort($numbers);
print_r($sortedNumbers);
