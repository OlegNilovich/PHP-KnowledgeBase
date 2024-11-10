<?php

#Деление по модулю, оператор % вычисляет остаток от деления

function isEven($number)
{
    return $number % 2 === 0;
}

var_dump(isEven(10)); // true
var_dump(isEven(3));  // false