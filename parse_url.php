<?php

#Вводим в адресную строку адрес http://laracasts/contact?id=12

#Функция разделяет URL-адрес на отдельные части
parse_url($_SERVER['REQUEST_URI'])['path'];

#Получаем массив с частами URL-адреса
array {
  ["path"] => "/contact", #Это путь
  ["query"]=> "id=12" #Это гет запрос
}