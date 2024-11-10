<?php

//  СОДЕРЖАНИЕ  //////////////////////////////////////////////////////////////////////

#  count - подсчитывает количество элементов в массиве или в объекте
#  array_count_values - подсчитывает количество всех значений в массиве
#  array_key_exists() - проверяет наличие указанного ключа или индекса
#  in_array - проверяет наличие значения в массиве
#  array_search - ищет первое найденное значение в массиве и возвращает его ключ
#  array_keys - возвращает все ключи массива
#  array_values - возвращает все значения массива
#  array_unique - убирает повторяющиеся значения из массива
#  array_filter - фильтрует массив с помощью колбэк функции
#  array_sum - возвращает сумму цифровых значений массива
#  range - создает массив цифр, в аргументах указываем начало и конец (1, 100)

//  COUNT  ///////////////////////////////////////////////////////////////////////////

$nums = [
	['a', 'b', 'c'],
	['d', 'e', 'f'],
	['g', 'h', 'i'],
];

// функция count(массив, мод 0/1) считает количество элементов в массиве
// 1 вторым аргументом делает подсчет всех эллементов массива, включая вложенные
count($nums); # 3
count($nums, 1); # 3 + 9 = 12


//  ARRAY_COUNT_VALUES  //////////////////////////////////////////////////////////////

// Исходный массив с повторяющимися значениями
$nums = array(2, 3, 2, 4, 3, 5, 2, 4, 5, 5);

// Используем функцию для подсчета количества вхождений каждого значения в массиве
$result = array_count_values($nums);

// Выводим результат на экран
foreach ($result as $value => $count) {
    echo "Значение: $value, Количество: $count";
    echo PHP_EOL;
}


//  ARRAY_KEY_EXISTS  ////////////////////////////////////////////////////////////////

// Определение ассоциативного массива
$myArray = array(
    "ключ1" => "значение1",
    "ключ2" => "значение2",
    "ключ3" => "значение3"
);

// Проверка наличия ключа "ключ2" в массиве
if (array_key_exists("ключ2", $myArray)) {
    echo "Ключ существует в массиве!";
} else {
    echo "Ключ отсутствует в массиве.";
}


//  IN_ARRAY  ////////////////////////////////////////////////////////////////////////

// Определение массива
$myArray = array("значение1", "значение2", "значение3");

// Проверка наличия значения "значение2" в массиве
if (in_array("значение2", $myArray)) {
    echo "Значение найдено в массиве!";
} else {
    echo "Значение не найдено в массиве.";
}


//  ARRAY_FILTER  ////////////////////////////////////////////////////////////////////

// Определение массива с числами
$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);

// Определение функции обратного вызова (колбэка) для фильтрации
function is_even($number) {
    // Функция возвращает true, если число четное, иначе false
    return $number % 2 == 0;
}

// Использование функции array_filter для фильтрации массива
$even_numbers = array_filter($numbers, "is_even");

// Вывод отфильтрованных четных чисел
echo "Четные числа: " . implode(", ", $even_numbers); #Четные числа: 2, 4, 6, 8, 10
