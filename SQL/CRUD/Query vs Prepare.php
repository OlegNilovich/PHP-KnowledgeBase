<?php

// Безопасный запрос к бд где используется методы:
// ->prepare() ->bindParam() ->execute()
// :id - это плейсхолдер, метка. вместо которой подставится значение $id
$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");
$statement = $pdo->prepare("SELECT * FROM tasks WHERE id=:id");
$id = $_GET['id'];
$statement->bindParam(":id", $id);
$statement->execute();
$task = $statement->fetch(PDO::FETCH_ASSOC);

// Небезопасный запрос к бд и использованием метода ->query
$pdo = new PDO("mysql:host=localhost; dbname=firstappdb", "root", "");
$id = $_GET['id'];
$query = "SELECT * FROM tasks WHERE id='$id'";
$statement = $pdo->query($query);
$task = $statement->fetch(PDO::FETCH_ASSOC);