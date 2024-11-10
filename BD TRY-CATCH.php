<?php

$host = 'localhost';
$db = 'dbname';
$user = 'root';
$pass = '';

try {

	$pdo = new PDO("mysql:host=$host; dbnane=$db", $user, $pass);

} catch (PDOExeption $error) {

	echo 'Ошибка соединения с БД '. $error->getMessage();
	
}