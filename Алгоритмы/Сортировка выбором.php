<?php

/*
	Сложность O(n^2)
*/

$nums = [33, 11, 22, 55, 44];

function selectionSort($array)
{	
	$length = count($array) -1;

	// Определяем индекс на который ставим наибольший элемент (4)
	for ($i=$length; $i > 0; $i--) { 
		
		$maxIndex = $i; // индекс максимального элемента (4)

		for ($j=0; $j < $i; $j++) { 
			
			if ($array[$j] >= $array[$maxIndex]) { // ищем максимальный элемент
				
				$maxIndex = $j; // запоминаем индекс
			}
		}

		// Если макс мндекс не равен текущему элементу
		if ($maxIndex != $i) {
			
			// Меняем элементы местами
			$temp = $array[$maxIndex];
			$array[$maxIndex] = $array[$i];
			$array[$i] = $temp;
		}
	}

	return $array;
}

print_r(selectionSort($nums));
