<?php

#Функция достает из массива пары ключ-значения и создает из них переменные

$arr = ['name' => 'Alex', 'age' => 31];

extract($arr);

echo $name;
echo $age;
