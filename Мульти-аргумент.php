<?php

#Функция принимает от 0 до бесконечности аргументов

function sum(...$numbers)
{
	return array_sum($numbers);
}

echo sum(1,2,3);
echo sum(1,2,3,4,5,6,7);
