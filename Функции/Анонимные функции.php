<?php

/*
		Анонимная функция является объектом первого класса
		 - Она является типом 'callable'
		 - Её можно сохранять в переменную
		 - Её можно передавать в агрументы другой функции
		 - Её можно возвращать из функции с помощью 'return'
*/

function calculator($x, $y, callable $operator)
{
	return $operator($x, $y);
}

echo calculator(2, 3, function($x, $y) { return $x + $y; });

#Сокращенная запись
echo calculator(2, 3, fn ($x, $y) => $x + $y) ;


