<?php // CREATE

$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");

// $запрос = "ВСТАВИТЬ В таблицу (заголовок, заголовок) ЗНАЧЕНИЯ (:метка, :метка)";
$sql = "INSERT INTO tasks (title, content) VALUES (:title, :content)";
$statement = $pdo->prepare($sql);

// Значения массива пост, полученные после отправки формы
$title = $_POST['title']; 
$content = $_POST['content'];

// Привязка значений $title и $content к меткам :title и :content
$statement->bindParam(':title', $title);
$statement->bindParam(':content', $content);

// выполнение запроса
$statement->execute();

// Перенаправляем на другую страницу
header("Location: /"); exit;