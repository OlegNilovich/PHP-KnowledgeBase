<?php

/*
	Сложность O(n^2);
*/

$numbers = [5, 3, 8, 2, 1];

function bubbleSort($array)
{
    // Определяем индекс на который ставим наибольший эллемент i(4)
    for ($i = count($array) -1; $i > 0; $i--) {
        
        // Внутренний цикл для сравнения и обмена элементов j(0)
        for ($j = 0; $j < $i; $j++) {
            
            // Если текущий элемент больше следующего, меняем их местами
            if ($array[$j] > $array[$j + 1]) {  // 5 > 3
                $temp = $array[$j];				// $temp = 5
                $array[$j] = $array[$j + 1];	// $array[0] = 3
                $array[$j + 1] = $temp;         // $array[1] = 5
            }
        }
    }
    
    return $array;
}

// Пример использования
$numbers = [5, 3, 8, 2, 1];
$sortedNumbers = bubbleSort($numbers);
print_r($sortedNumbers);


