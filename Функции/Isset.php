<?php

// функция isset() помогает узнать существует ли переменная или другой объект
// вовзращает true или false

$string = "Hello";

if (isset($string)) {
	echo $string;
}else{
	echo "Переменная не найдена";
}