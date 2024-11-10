<?php

#Контейнер помогает избежать дублирование кода

#ПРОБЛЕМА:

#В разных частях частах кода проекта нам требуется создавать объект класса Database
$config = require 'config.php';
$db = new Database($config['database']);

#РЕШЕНИЕ:

#Создаем класс Контейнер
class Container
{
	protected $bindings = [];

	public function bind($key, $resolver)
	{
		$this->bindings[$key] = $resolver;
	}

	public function resolve($key)
	{
		#Проверка на существование функции-резолвера
		if (! array_key_exists($key, $this->bindings)) {
			throw new \Exeption("Cant do it for{$key}");
		}

		$resolver = $this->bindings[$key];

		return call_user_func($resolver);
	}
}

#Создаем экземпляр контейнера в главном файле приложения
$container = new Container();

#Регистрируем функцию-резольвер, создающую объект класса Database по ключу'Core\Database'
$container->bind('Core\Database', function() {
	$config = require base_path('config.php');

	return new Database($config['database']);
});

#Вызываем функцию-резольвер с ключом 'Core\Database', получаем объект класса Database
$db = $container->resolve('Core\Database');