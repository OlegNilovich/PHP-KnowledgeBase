<?php

#Установка куки( ключ  |    значение   |   путь   |  кука живет 10 секунд )
setcookie('cookie_key', 'cookie_value', path: '/', expires_or_options: time()+10);

#Удаление куки( ключ  |    значение   |   путь   |  убавляем время жизни - 10 сек )
setcookie('cookie_key', 'cookie_value', path: '/', expires_or_options: time()-10);

#ВАЖНО: Кука должна удаляться с теми же аргументами, как при установке


// СЧЕТЧИК ПОСЕЩЕНИЙ

#сброс счетчика
if (isset($_GET['do']) && $_GET['do'] == 'reset') {
  setcookie('count', '', time()-60);
  header("Location: index.php"); exit;
}

#cчетчик посещений
isset($_COOKIE['count']) ? setcookie('count', ++$_COOKIE['count'], time()+60) :
setcookie('count', 1, time()+60);

echo "Вы посетили страницу: " . ($_COOKIE['count'] ?? 1);

echo '<p> <a href="?do=reset">Reset</a> </p>';
