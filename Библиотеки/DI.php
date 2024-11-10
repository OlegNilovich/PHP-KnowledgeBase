<?php                     // Dependency Injection

// Установка через консоль

composer require php-di/php-di

// использование

$container = new Container();
$container->call($handler, $vars);

// DI сам выполняет такую цепочку действий, создает объекты и скармливает
// другим объектам, по скольку они зависимы друг от друга

$auth = new Auth;
$imageManager = new ImageManager($auth);
$QueryBuilder = new QueryBuilder($imageManager);
new HomeController(QueryBuilder);

// или эту цепочку действий

new HomeController(new QueryBuilder(new imageManager(new Auth)));