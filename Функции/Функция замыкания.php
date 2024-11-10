<?php

/*
				Функции замыкания - особый вид анонимных функций

				Функция запоминает переменную из глобальной области видимости
				с помощью оператора use($name) 

				Мы можем сохранить вызов функции в переменную
				$greet = greeting("John");

				Затем вызывать её с сохраненной переменной
				$greet();
*/

function greeting($name) {
    return function() use ($name) {
        echo "Hello, $name!";
    };
}

$greet = greeting("John");
$greet(); // Выведет: Hello, John!
