<?php

/*
	Улучшенный поиск уникальных эллементов благодаря отсортированному списку.

	Каждый предидущий эллемент сравнивается со следующим
	Если они не равны, то предидущй эллемент записывается в массив уникальных чисел
	А следующее число становится текущим
*/

$sortedNumbers = [11, 11, 22, 33, 33, 33, 44, 44, 55];

function uniqueNumbers($numbers)
{	
	$uniqueNumbers = [];
	$prevNumber = $numbers[0];

	for ($i=1; $i < count($numbers); $i++) { 
		
		if ($prevNumber !== $numbers[$i]) {
			
			$uniqueNumbers[] = $prevNumber;
			$prevNumber = $numbers[$i];
		}
	}

	$uniqueNumbers[] = $prevNumber;
	return $uniqueNumbers;
}

print_r(uniqueNumbers($sortedNumbers));
