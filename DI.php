<?php

/*
	DEPENDENCY INJECTION - ВНЕДРЕНИЕ ЗАВИСИМОСТЕЙ
	Это зависимость одного класса от объектов другого класса

	Если объекту класса User для работы нужен объект класса Database
	Тогда требуем передачи объекта класса Database В конструктор класса User
*/

class Database
{
	public function findUser($id)
	{
		return 'SELECT * FROM users WHERE id=$id';
	}
}

class User
{
    private $db;

    #Конструктор нужнается в экземпляре класса Database
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    #Чтобы этот метод смог использовать этот экземпляр
    public function getUser($id)
    {
        return $this->db->findUser($id);
    }
}

$db = new Database;
$user = new User($db);
$userWithId5 = $user->getUser(5);

