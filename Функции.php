<?php

// функция с возвращаемым результатом
function functionOne()
{
	return "Hello";                  # return завершает выполнение функции
	echo "Этот текст не выведится";  # инструкции ниже не будут выполнены
}

echo functionOne(); # выведет Hello


// функция принимает безграничное кол-во аргументов и создает из них массив.
function functionTwo(...$nums) # три точки
{
	$result = 0;
	foreach ($nums as $num) {
		$result += $num;
	}
	echo "Сумма чисел равна: $result";
}

functionTwo(1,2,3,4,5,6); # выведет 21


// функция со статическими(static) параметрами
// переменная $num не теряет значение при повторном вызове функции
function functionThree()
{
	static $num = 0;   # static
	$num += 3;
	echo $num;
	echo PHP_EOL;
}

functionThree(); # выведет 3
functionThree(); # выведет 6
functionThree(); # выведет 9


// Функция с указанием типа аргументов
function functionFive(int $num1, int $num2, int $num3)  # int
{
	echo $num1 + $num2 + $num3;
}

functionFive(2,3,4); # выведет 9


// Функция с указанием типа результата
function functionSix($num1, $num2, $num3): string
{
	return $num1 + $num2 + $num3;
}

var_dump(functionSix(2,3,4)); # выведет string "9"


// функция с именованными аргументами PHP-8 (порядок аргументов необязателен)
function functionSeven($name, $age, $gender)
{
    echo "Привет, $name! Тебе $age лет и ты $gender.";
}

functionSeven(gender: "женщина", age: 25, name: "Анна"); 
// выведет Привет, Анна! Тебе 25 лет и ты женщина