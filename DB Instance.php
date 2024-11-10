<?php

#Создаем одно подключение к базе данных (синглтон)

function dbInstance() : PDO
{
	#Статическая переменная запоминает подключение к базе данных
	static $db;

	if($db === null){
		$db = new PDO('mysql:host=localhost;dbname=lavrik', 'root', '', [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
		]);

		$db->exec('SET NAMES UTF8');
	}

	return $db;
}
