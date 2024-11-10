<?php

#Чтобы внедрить сиситему маршрутизации(роутинга) на сайт
#Нужно поместить в корневую папку файл с настройками .htaccess
#Который перенаправляет все запросы на файл index.php
#В зависимости от URL-адреса, роутинг подключает нужный файл контроллера


// ПРИМЕР 1 //////////////////////////////////////////////////////////////////////////

#функция parse_url() отделяет путь от URL-адреса
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

#Список маршрутов(роутов)
$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
];

#Если array_key_exists находит ключ - подключается нужный контроллер
#Иначе вызывается функция abort() и рендерит страницу с ошибкой 404
function routeToController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
  require_once $routes[$uri];
  } else {
    abort();
  }
}

#Функция вызывает страницу с ошибкой (404 по умолчанию)
function abort($code = 404)
{
  http_response_code($code);
  require "views/{$code}.php";
  die;
}

#Вызов функции роутинга
routeToController($uri, $routes);


// ПРИМЕР 2 //////////////////////////////////////////////////////////////////////////

// В контексте контроллера, класс называется Контроллер, а его методы - Экшены.
// В контроллере вызывается Модель и передается в Вид

// Роутинг уровень 1

if ($_SERVER['REQUEST_URI'] == '/about') {
  include 'about.php';
} elseif ($_SERVER['REQUEST_URI'] == 'posts') {
  include 'posts.php';
} elseif ($_SERVER['REQUEST_URI'] == '/contact') {
include 'contact.php';
} else {
  include '404.php';
}

// Роутинг уровень 2

require '../vendor/autoload.php';
use App\controllers\HomeController;

$url = $_SERVER['REQUEST_URI'];
$controller = [];

// HomeController::class - константа содержащая полный путь к классу
// и его неймспейсу, например App\controllers\HomeController 
if($url == '/') {
  $controller = ["App\controllers\HomeController", "index"]; // способ 1
} elseif($url == '/about') {
  $controller = [HomeController::class, "about"]; // способ 2
}

// функция call_user_func(), вызывает метод нужного нам класса, для этого
// передаем в параметрах массив с названием класса и названием метода
if (empty($controller)) {
  echo "404 | Error";
}else{
  call_user_func($controller);
}