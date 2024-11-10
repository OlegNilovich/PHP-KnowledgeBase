<?php // READ

// Подключаемся к бд (тип бд:имя хоста; имя бд, имя админа, пароль)
$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");

// Подготавливаем Запрос(Statement) к бд, в скобказ пишем SQL запрос
$statement = $pdo->prepare("SELECT * FROM tasks");

// Выполняем запрос к бд
// $запрос->выполнить(); запрос возвращает True или False
$statement->execute();

// Извлекаем массив с данными из запроса и помещаем их в переменную $tasks
// $задачи = $запрос->ИзвлечьВсё(2), где 2 ассоциативный массив, а 3 индексный.
$tasks = $statement->fetchAll(2);

?>