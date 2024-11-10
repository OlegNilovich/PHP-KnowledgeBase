<?php

/*
	Генераторы служат для перебора огромных массивов данных
	Вместо того чтобы держать весь массив данных в памяти
	Генератор вытаскивает по одному эллементу массива
	по требованию функции foreach
*/

function generateArray()
{
	$i = 1;
	while ($i < 20) {
		yield $i;
		$i++;
	}
}

foreach (generateArray() as $value) {
	echo $value; 
	echo PHP_EOL;
}
