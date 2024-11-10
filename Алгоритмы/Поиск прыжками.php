<?php

$nums = [11, 22, 33, 44, 55, 66, 77, 88, 99];

function jumpSearch($array, $target) {

    $length = count($array); // Размер массива (9)
    $step = sqrt($length);   // Размер шага (3)

    // Поиск блока, в котором находится искомый элемент
    while ($array[min($step, $length) - 1] < $target) {
        $prev = $step;
        $step += sqrt($length);
        if ($prev >= $length) {
            return false; // Искомый элемент не найден
        }
    }
    
    // Поиск искомого элемента в блоке
    while ($array[$prev] < $target) {
        $prev++;
        if ($prev == min($step, $length)) {
            return false; // Искомый элемент не найден
        }
    }
    
    if ($array[$prev] == $target) {
        echo "Индекс искомого эллемента: $prev";
        return $prev; // Искомый элемент найден
    }
    
    echo "Искомый элемент не найден";
    return false; // Искомый элемент не найден
}

// Пример использования
$nums = [11, 22, 33, 44, 55, 66, 77, 88, 99];
$target = 44;
$result = jumpSearch($nums, $target);



