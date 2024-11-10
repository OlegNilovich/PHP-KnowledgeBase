<?php
//РЕГУЛЯРНЫЕ ВЫРАЖЕНИЯ

// ^ начало строки
// $ конец строки
// ^$ пустая строка, т.к. между символами начало и конца строки ничего нет


/* Регулярное выражение разбирает URL на две группы с именами "controller" и "action"
Например: для URL "/blog/show" будет получен контроллер "blog" и экшен "show".*/
Router::add('^(P<controller>[a-z-]+)/(P<action>[a-z-]+)/?$',);







// $text - строка, в которой выполняется поиск
$text = "Hello, friend! This is an example text.";

// $pattern - последовательность символов и букв, которые мы ищем
$pattern = "/friend/";

// $word - массив, в которую будет помещено слово, если оно найдется
if (preg_match($pattern, $text, $word)) {
    echo "Слово $word[0] найдено!" . PHP_EOL;
} else {
    echo "Слово $pattern не найдено." . PHP_EOL;
}

// Используем регулярное выражение для замены слова "world" на "PHP"
$newText = preg_replace($pattern, "Brother", $text);
echo $newText;
