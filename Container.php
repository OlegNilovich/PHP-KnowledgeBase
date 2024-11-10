<?php

/*
	Контейнеры используются в современных фреймворках
	Когда требуется объект, контейнер создает его экземпляр
	и автоматически внедряет необходимые зависимости.
*/

class Container
{
	public function getUser()
	{
		$db = new Database;
		$user = new User($db);
		return $user;
	}
}

$userWithId5 = $container->getUser()->findUser(5);
